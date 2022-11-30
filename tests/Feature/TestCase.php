<?php

namespace Orion\Tests\Feature;

use Orion\Testing\InteractsWithAuthorization;
use Orion\Testing\InteractsWithJsonFields;
use Orion\Testing\InteractsWithResources;
use Orion\Tests\Fixtures\App\Models\User;
use Orion\Tests\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use InteractsWithResources, InteractsWithJsonFields, InteractsWithAuthorization;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withAuth();
    }

    protected function resolveUserModelClass(): ?string
    {
        return User::class;
    }

    protected function noSupportForJsonDbOperations(): bool
    {
        if (config('database.default') === 'sqlite') {
            return true;
        }

        return config('database.default') === 'testing' &&
            config('database.connections.testing.driver') === 'sqlite';
    }
}
