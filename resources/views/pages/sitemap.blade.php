<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    @foreach( Cache::get('sitemap') as $url => $params )
        <url>
            <loc>{{ str_replace('hellip','',(htmlentities($url))) }}</loc> 
            <lastmod>{{ date('Y-m-d', strtotime(($params['lastmod']))) }}</lastmod>
            <changefreq>{{$params['changefreq']}}</changefreq>
            <priority>{{$params['priority']}}</priority>
        </url>
    @endforeach
</urlset>