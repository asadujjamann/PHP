<?php

class PostManager 
{
    public function createPost($title, $content)
    {
        echo "<h2> Post Title: $title </h2>
            <p> Post Content: $content </p>";
    }
}

$postManager = new PostManager();
$postManager->createPost("SOLID Principles", "Understand SRP with examples.");

