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

class GetResourceQuotaCommand extends Command
{

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:get-resourcequota';

    protected function configure()
    {
        $this->
        // the short description shown while running "php bin/console list"
        setDescription('Get resource quota of a namespace.')
            ->
        // the full command description shown when running the command with
        // the "--help" option
        setHelp('This command allows you to get resource quota of a namespace.')
            ->
        // configure an argument
        addArgument('namespace', InputArgument::REQUIRED, 'The namespace of cluster.')
            ->
        // configure an option
        addOption('object', 'o|O', InputOption::VALUE_NONE, 'all object attributes');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $object = (boolean) $input->getOption('object');
            $kn = KubectlProxy::getResourceQuota($input->getArgument('namespace'), $object);
            $output->writeln($kn);
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
        }
    }
}