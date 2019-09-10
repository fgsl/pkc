<?php
/**
 * PHP Kubectl terminal console
 * @author Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br>
 * @license https://www.gnu.org/licenses/lgpl-3.0.en.html
 */
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Fgsl\Kubectl\KubernetesPods;
use App\Helper\Timer;

class DeletePodCommand extends Command
{

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:delete-pod';

    protected function configure()
    {
        $this->
        // the short description shown while running "php bin/console list"
        setDescription('Delete a pod.')
            ->
        // the full command description shown when running the command with
        // the "--help" option
        setHelp('This command allows you to delete a pod.')
            ->
        // configure an argument
        addArgument('namespace', InputArgument::REQUIRED, 'The namespace of cluster.')
        ->addArgument('module', InputArgument::REQUIRED, 'The module of namespace.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            Timer::start();
            $response = KubernetesPods::delete($input->getArgument('namespace'), $input->getArgument('module'));
            $time = Timer::stop();
            $output->writeln($response);
            $output->writeln("Elapsed time: {$time}s");
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
        }
    }
}