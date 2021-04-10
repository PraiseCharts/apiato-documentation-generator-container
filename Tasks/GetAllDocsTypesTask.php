<?php

namespace App\Containers\VendorSection\Documentation\Tasks;

use App\Containers\VendorSection\Documentation\Exceptions\NoDocTypesFoundException;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Config;

class GetAllDocsTypesTask extends Task
{
    /**
     * @throws NoDocTypesFoundException
     */
    public function run(): array
    {
        if (!$configTypes = Config::get('documentation-container.types')) {
            throw new NoDocTypesFoundException();
        }

        $types = [];
        foreach ($configTypes as $key => $value) {
            $types[] = $key;
        }

        // NOTE: type names must be the same as in the objects property (`public static $type = 'private';`)
        return $types;
    }
}
