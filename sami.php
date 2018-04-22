<?php

declare(strict_types=1);

return new Sami\Sami(__DIR__ . "/libkinetic/src", [
	"title" => "libkinetic v0.0.1",
	"build_dir" => __DIR__ . "/docs/sami",
	"cache_dir" => __DIR__ . "/.sami/cache",
	"remote_repository" => new Sami\RemoteRepository\GitHubRemoteRepository("SOF3/libkinetic", __DIR__),
]);
