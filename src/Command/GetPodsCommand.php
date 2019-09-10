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
use Fgsl\Kubectl\KubectlProxy;
use Symfony\Component\Console\Input\InputOption;
use App\Helper\Timer;

class GetPodsCommand extends Command
{

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:get-pods';

    protected function configure()
    {
        $this->
        // the short description shown while running "php bin/console list"
        setDescription('Get pods of a namespace.')
            ->
        // the full command description shown when running the command with
        // the "--help" option
        setHelp('This command allows you to get pods of a namespace.')
            ->
        // configure an argument
        addArgument('namespace', InputArgument::REQUIRED, 'The namespace of cluster.')
            ->
        // configure an option
        addOption('object', 'o|O', InputOption::VALUE_NONE, 'all object attributes')
            ->addOption('labels', 'l|L', InputOption::VALUE_NONE, 'show labels');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $object = (boolean) $input->getOption('object');
            $showLabels = (boolean) $input->getOption('labels');
            Timer::start();
            $kn = KubectlProxy::getPods($input->getArgument('namespace'), $object, $showLabels);
            $time = Timer::stop();
            $output->writeln($kn);
            $output->writeln("Elapsed time: {$time}s");
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
        }
    }
}