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

class GetVolumesCommand extends Command
{

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:get-volumes';

    protected function configure()
    {
        $this->
        // the short description shown while running "php bin/console list"
        setDescription('Get volumes of a module.')
            ->
        // the full command description shown when running the command with
        // the "--help" option
        setHelp('This command allows you to get volumes of a module.')
            ->
        // configure an argument
        addArgument('module', InputArgument::REQUIRED, 'The module of a namespace.')
            ->
        // configure an option
        addOption('object', 'o|O', InputOption::VALUE_NONE, 'all object attributes');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $object = (boolean) $input->getOption('object');
            Timer::start();
            $kn = KubectlProxy::getVolumes($input->getArgument('module'), $object);
            $time = Timer::stop();
            $output->writeln($kn);
            $output->writeln("Elapsed time: {$time}s");
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
        }
    }
}