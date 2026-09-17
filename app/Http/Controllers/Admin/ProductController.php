<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Request\AddProductRequest;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.products.index')->with([
            'products' => Product::with(['positives', 'negatives'])->latest()->get()
        ]);
    }


    public function create()
    {
        return view('admin.products.create');
    }


    public function store(AddProductRequest $request)
    {
        if ($request->validated()) {
            $data = $request->validated();
            $data['image_path'] = $this->saveImage($request->file('image_path'));
            $product = Product::create($data);
            $product->qr_code_path =  $this->saveProductQRCode($product->id);
            $product->save();
            $this->mergeProductImageWithQRCode($product);
            return redirect()->route('admin.products.index')->with([
                'success' => 'Product added successfully.'
            ]);
        }
    }


    public function show(Product $product)
    {
        abort(404);
    }


    public function edit(Product $product)
    {
        return view('admin.products.edit')->with([
            'product' => $product
        ]);
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->validated()) {
            $data = $request->validated();
            if($request->has('image_path')){
                // remove the product old image
                $this->removeProductImageFromStorage($product->image_path);
                // save the new product image
                $data['image_path'] = $this->saveImage($request->file('image_path'));
                // add the qr code to the new image
                $this->mergeProductImageWithQRCode($product);
            }
            $product = update($data);
            return redirect()->route('admin.products.index')->with([
                'success' => 'Product updated successfully.'
            ]);
        }

    }


    public function destroy(Product $product)
    {
        // remove the product image
        $this->removeProductImageFromStorage($product->image_path);
        // remote the product qr code
        $this->removeProductImageFromStorage($product->qr_code_path);
        // delete 
        $product->delete();

        return redirect()->route('admin.products.index')->with([
                'success' => 'Product deleted successfully.'
        ]);


    }

    /* 14:27 voy alli 
    Upload and save product image */
    public function saveImage($file)
    {
        $image_name = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('images/products', $image_name, 'public');
        return 'storage/images/products/' . $image_name;
    }

    /* Save the product qr code */
    public function saveProductQRCode($productId)
    {
        // crear el generador de qr   
        $builder = new Builder(
            writer: new PngWriter(),
            writerOptions: [],
            validateResult: false,
            data: $productId,
            size:  60
            
        );
        // generar el codigo qr
        $qrCode = $builder->build();
        // definir la path
        $qrCodePath = 'qr_codes/'.$productId.'.png';
        // save the qr code en el disco "public"
        Storage::disk('public')->put($qrCodePath, $qrCode->getString());
        // return the file path
        return  'storage/'.$qrCodePath;
    }

    /* Merge the product image with the QR code */
    public function mergeProductImageWithQRCode(Product $product)
    {
       // get the product image ya sea en png o jpeg
       $productImagePath = $product->image_path;

       // check the type of the product image
       if(mime_content_type($productImagePath) === 'image/png'){
        $createProductImage = imagecreatefrompng($productImagePath);
       } else if(mime_content_type($productImagePath) === 'image/jpeg'){
        $createProductImage = imagecreatefromjpeg($productImagePath);
       } 
       // get the qr code
       $qrCodePath = $product->qr_code_path;
       $qrImage = imageCreatefrompng($qrCodePath);

       // get the dimensions of the images
       $productWidth = imagesx($createProductImage);
       $productHeight = imagesy($createProductImage);
       $qrWidth = imagesx($qrImage);
       $qrHeight = imagesy($qrImage);

       // calculate the position to center the qr code in the product image
       $dstX = ($productWidth  - $qrWidth) / 2;
       $dstY = ($productHeight  - $qrHeight) / 2;

       // add the qr code to the product image

       imagecopy($createProductImage, $qrImage, $dstX, $dstY, 0, 0, $qrWidth, $qrHeight);

       // we do not lose the background of png images
       imagesavealpha($createProductImage, true);

       imagepng($createProductImage, $product->image_path);
       // free the memory
       imagedestroy($createProductImage);
       imagedestroy($qrImage);
    }

    /* remove the product old image */
    public function removeProductImageFromStorage($file)
    {
        $path = public_path($file);
        if(File::exists($path)){
             File::delete($path);
        }
    }

}
