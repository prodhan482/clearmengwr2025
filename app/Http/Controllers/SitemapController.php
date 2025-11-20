<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;


class SitemapController extends Controller
{

    public function index()
    {
        $sitemap = Sitemap::create();

        // Add static pages to the sitemap
        $sitemap->add(url('/'), now()); 
        $sitemap->add(url('/about'), now());
        $sitemap->add(url('/contact_us'), now());
        $sitemap->add(url('/contact&us'), now());
        $sitemap->add(url('/subscriber'), now());
        $sitemap->add(url('/clients'), now());
        $sitemap->add(url('/service/sales&marketing'), now());
        $sitemap->add(url('/service/installtaions'), now());
        $sitemap->add(url('/service/maintenance&repairing'), now());
        $sitemap->add(url('/about_us/our_history'), now());
        $sitemap->add(url('/about_us/our_recognition'), now());
        $sitemap->add(url('/about_us/our_sustainability'), now());
        $sitemap->add(url('/about_us/our_stratergy'), now());
        $sitemap->add(url('/all_products'), now());
        $sitemap->add(url('/product_details/j1000'), now());
        $sitemap->add(url('/product_details/A1000'), now());
        $sitemap->add(url('/product_details/G7'), now());
        $sitemap->add(url('/product_details/GA700'), now());
        $sitemap->add(url('/product_details/GA500'), now());
        $sitemap->add(url('/product_details/L1000A'), now());
        $sitemap->add(url('/product_details/T1000'), now());
        $sitemap->add(url('/product_details/V1000'), now());
        $sitemap->add(url('/product_details/E1000'), now());
        $sitemap->add(url('/product_details/option-card'), now());
        $sitemap->add(url('/product_details/profibus'), now());
        $sitemap->add(url('/product_details/braking-unit'), now());
        $sitemap->add(url('/product_details/braking-resistor'), now());
        $sitemap->add(url('/product_details/servo&motors'), now());
        $sitemap->add(url('/product_details/hmi&plc'), now());
        $sitemap->add(url('/product_details/robotics'), now());
        $sitemap->add(url('/product_details/rfi'), now());
        $sitemap->add(url('/product_details/dc'), now());
        $sitemap->add(url('/product_details/toroidal'), now());
        $sitemap->add(url('/product_details/braker'), now());
        $sitemap->add(url('/product_details/earthquake'), now());
        $sitemap->add(url('/product_details/generators'), now());
        $sitemap->add(url('/product_details/arcube'), now());
        $sitemap->add(url('/product_details/arcode'), now());
        $sitemap->add(url('/product_details/arl-200s'), now());
        $sitemap->add(url('/product_details/arl300'), now());
        $sitemap->add(url('/product_details/ard'), now());
        $sitemap->add(url('/product_details/bi'), now());
        $sitemap->add(url('/product_details/extension_card/fx-ex'), now());
        $sitemap->add(url('/product_details/extension_card/fx-seri'), now());
        $sitemap->add(url('/product_details/g&Z_plus'), now());
        $sitemap->add(url('/product_details/gearless_motors'), now());
        $sitemap->add(url('/product_details/eker_gearless_motors'), now());
        $sitemap->add(url('/product_details/mono'), now());
        $sitemap->add(url('/product_details/arkel-adrive'), now());
        $sitemap->add(url('/product_details/km-10'), now());
        $sitemap->add(url('/product_details/km-20'), now());
        $sitemap->add(url('/product_details/bar-magnet'), now());
        $sitemap->add(url('/product_details/encoder'), now());
        $sitemap->add(url('/product_details/full-heights-sensor'), now());
        $sitemap->add(url('/product_details/limit-switch'), now());
        $sitemap->add(url('/product_details/round-magnet'), now());
        $sitemap->add(url('/product_details/lop-cop'), now());
        $sitemap->add(url('/product_details/complete-lifts'), now());
        $sitemap->add(url('/product_details/arkel-ups'), now());
        $sitemap->add(url('/view-catalog'), now());

  

        // Add dynamic content to the sitemap (e.g., articles)
        // $articles = Article::all();
        // foreach ($articles as $article) {
        //     $sitemap->add(url("/articles/{$article->slug}"), $article->updated_at);
        // }

        return $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
