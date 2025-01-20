<?php

if (!function_exists('getYoutubeEmbedLink')) {
    /**
     * Mengkonversi link YouTube menjadi link embed.
     *
     * @param string $url
     * @return string
     */
    function getYoutubeEmbedLink($url)
    {
        preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]{11})/", $url, $matches);
        if (isset($matches[1])) {
            return "https://www.youtube.com/embed/" . $matches[1];
        }

        preg_match("/^(?:https?:\/\/)?(?:www\.)?youtu\.be\/([a-zA-Z0-9_-]{11})/", $url, $matches);
        if (isset($matches[1])) {
            return "https://www.youtube.com/embed/" . $matches[1];
        }

        // Jika link tidak valid, kembalikan link YouTube default
        return $url;
    }
}
