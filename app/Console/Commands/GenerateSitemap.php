<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap.xml file from routes';

    public function handle()
    {
        $sitemap = Sitemap::create();
        $now = Carbon::now();

        // Only static GET routes
        $routes = collect(Route::getRoutes())->filter(function ($route) {
            return in_array('GET', $route->methods()) &&
                   str_starts_with($route->uri(), '/') &&
                   !str_contains($route->uri(), '{') &&
                   !str_starts_with($route->uri(), '_');
        });

        foreach ($routes as $route) {
            $sitemap->add(
                Url::create(url($route->uri()))
                    ->setLastModificationDate($now)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setPriority(0.8)
            );
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Sitemap generated at public/sitemap.xml');
    }
}







// Dynamic products everything included

// <?php

// namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Route;
// use Spatie\Sitemap\Sitemap;
// use Spatie\Sitemap\Tags\Url;
// use Carbon\Carbon;

// use App\Models\Product;
// use App\Models\Blog; // Add other models as needed

// class SitemapController extends Controller
// {
//     public function index()
//     {
//         $sitemap = Sitemap::create();
//         $now = Carbon::now();

//         // ✅ 1. Static GET routes (without parameters)
//         $routes = collect(Route::getRoutes())->filter(function ($route) {
//             return in_array('GET', $route->methods()) &&
//                    str_starts_with($route->uri(), '/') &&
//                    !str_contains($route->uri(), '{') && // Ignore parameter routes
//                    !str_starts_with($route->uri(), '_'); // Ignore internal/system routes
//         });

//         foreach ($routes as $route) {
//             $sitemap->add(
//                 Url::create(url($route->uri()))
//                     ->setLastModificationDate($now)
//             );
//         }

//         // ✅ 2. Dynamic Product URLs
//         $products = Product::all();
//         foreach ($products as $product) {
//             $sitemap->add(
//                 Url::create(url("/product_details/{$product->slug}"))
//                     ->setLastModificationDate($product->updated_at ?? $now)
//             );
//         }

//         // ✅ 3. Dynamic Blog URLs (if available)
//         $blogs = Blog::all();
//         foreach ($blogs as $blog) {
//             $sitemap->add(
//                 Url::create(url("/blogs/{$blog->slug}"))
//                     ->setLastModificationDate($blog->updated_at ?? $now)
//             );
//         }

//         // 🔚 Save sitemap
//         $sitemap->writeToFile(public_path('sitemap.xml'));

//         return response()->file(public_path('sitemap.xml'));
//     }
// }
