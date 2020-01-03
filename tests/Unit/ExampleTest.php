<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHasFile()
    {
        $this->assertDatabaseHas('fichiers', [
            'file_path' => 'upload/allocation_memoire.pdf'
        ]);  
    }
    public function testUploadFile()
    {
        Storage::fake('public');
 
        $this->json('post', '/upload', [
            'file' => $file = UploadedFile::fake()->image('random.jpg')
        ]);
 
        $this->assertEquals('file/' . $file->hashName(), Upload::latest()->first()->file);
 
        Storage::disk('public')->assertExists('file/' . $file->hashName());
    }

}
