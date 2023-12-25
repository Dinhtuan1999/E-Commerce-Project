<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Components\Recursive;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    use StorageImageTrait;
    private $product;
    private $category;
    private $tag;
    public function __construct(Category $category, Product $product, Tag $tag)
    {
        $this->product = $product;
        $this->category = $category;
        $this->tag = $tag;
    }

    public function index()
    {
        $products = $this->product->latest()->paginate(5);

        return view("admin.product.index", ['products' => $products]);

    }

    public function create()
    {

        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.create', ['htmlOption' => $htmlOption]);

    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->product_name,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'user_id' => auth()->id(),
            ];

            $dataUploadFeatureImageName = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImageName)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImageName['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImageName['file_path'];
            }

            $product = $this->product->create($dataProductCreate);

            //insert image detail for product
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileImage) {
                    $productImageDetail = $this->storageTraitUploadMultiple($fileImage, 'product');

                    $product->productImages()->create([
                        'image_name' => $productImageDetail['file_name'],
                        'image_path' => $productImageDetail['file_path'],

                    ]);
                }
            }

            //insert tag for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tag = $this->tag->firstOrCreate([
                        'name' => $tagItem,
                    ]);

                    $tagIds[] = $tag->id;

                }
                $product->productTags()->attach($tagIds);
            }

            DB::commit();
            return redirect()->route('products.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message :" . $exception->getMessage() . '-' . 'line:' . $exception->getLine());
        }

    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);

        return view('admin.product.edit',['htmlOption'=> $htmlOption, 'product' => $product]);
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);

        return $htmlOption;
    }

    public function uploadImages(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

}
