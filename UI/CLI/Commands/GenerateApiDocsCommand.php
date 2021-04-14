<?php

namespace App\Containers\VendorSection\Documentation\UI\CLI\Commands;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\VendorSection\Documentation\Actions\GenerateDocumentationAction;
use App\Ship\Parents\Commands\ConsoleCommand;

class GenerateApiDocsCommand extends ConsoleCommand
{
	protected $signature = "apiato:apidoc";

	protected $description = "Generate API Documentations with (API-Doc-JS)";

	public function handle(): void
	{
		app(GenerateDocumentationAction::class)->run($this);
	}
}
