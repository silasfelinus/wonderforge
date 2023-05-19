<?php

namespace App\Http\Controllers;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RedbubbleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Fetch the items from Redbubble and pass it to your view
        $items = $this->fetchItemsFromRedbubble();
        return Inertia::render('RedbubbleIndex', ['items' => $items]);
    }

    private function fetchItemsFromRedbubble() {
        $browser = new HttpBrowser(HttpClient::create());
        $url = 'https://www.redbubble.com/people/CafePurr/shop';

        $crawler = $browser->request('GET', $url);

        $items = $crawler->filter('.styles__gridItemContent-ew82fg-8')->each(function ($node) {
            $image = $node->filter('img')->attr('src');
            $title = $node->filter('.styles__workTitle-ew82fg-10')->text();
            $description = $node->filter('.styles__description-ew82fg-14')->text();
            $link = $node->filter('a')->link()->getUri();

            return compact('image', 'title', 'description', 'link');
        });

        return $items;
    }

    //... Rest of your controller methods
}
