<?php

namespace App\Containers\VendorSection\Documentation\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\VendorSection\Documentation\Tasks\GenerateAPIDocsTask;
use App\Containers\VendorSection\Documentation\Tasks\GetAllDocsTypesTask;
use App\Containers\VendorSection\Documentation\Tasks\RenderTemplatesTask;
use App\Containers\VendorSection\Documentation\UI\CLI\Commands\GenerateApiDocsCommand;
use App\Ship\Parents\Actions\Action;

class GenerateDocumentationAction extends Action
{
	public function run(GenerateApiDocsCommand $console): void
	{
		// parse the markdown file.
		Apiato::call(RenderTemplatesTask::class);

		// get docs types that needs to be generated by the user base on his configs.
		$types = Apiato::call(GetAllDocsTypesTask::class);

		$console->info("Generating API Documentations for (" . implode(' & ', $types) . ")\n");

		// for each type, generate docs.
		$documentationUrls = array_map(static function ($type) use ($console) {
			return Apiato::call(GenerateAPIDocsTask::class, [$type, $console]);
		}, $types);

		$console->info("Done! You can access your API Docs at: \n" . implode("\n", $documentationUrls));
	}
}
