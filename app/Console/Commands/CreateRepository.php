<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

class CreateRepository extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a repository and interface for a given entity';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->createInterface($this->argument('name'));
        $this->createRepository($this->argument('name'));

        $this->info('Repository and interface created successfully!');
    }

    private function createInterface($entity)
    {
        $interfaceContent = "<?php\n\nnamespace App\Interfaces;\n\ninterface " . $entity . "RepositoryInterface\n{\n    // Add your interface methods here\n}";

        file_put_contents(app_path('Interfaces/' . $entity . 'RepositoryInterface.php'), $interfaceContent);
    }

    private function createRepository($entity)
    {
        $repositoryContent = "<?php\n\nnamespace App\Repositories;\n\nuse App\Interfaces\\" . $entity . "RepositoryInterface;\n\nuse App\Models\\" . $entity . ";\n\nclass " . $entity . "Repository implements " . $entity . "RepositoryInterface\n{\n    // Implement the interface methods here\n}";

        file_put_contents(app_path('Repositories/' . $entity . 'Repository.php'), $repositoryContent);
    }
 
    /**
     * Prompt for missing arguments (name and password).
     *
     * @return array
     */
    protected function getMissingArguments()
    {
        $arguments = [];

        if (! $this->argument('name')) {
            $arguments['name'] = $this->ask('What is the name of the admin user?');
        }

        return $arguments;
    }    
}