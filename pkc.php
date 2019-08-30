<?php
/**
 * PHP Kubectl terminal console
 * @author Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br>
 * @license https://www.gnu.org/licenses/lgpl-3.0.en.html
 */

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\Command\GetNamespaceCommand;
use Fgsl\Kubectl\KubectlProxy;

// checks if kubectl is installed
if (!KubectlProxy::isInstalled()){
    echo "kubectl is not installed!\n";
    exit;
}

$application = new Application();
$application->add(new GetNamespaceCommand());
$application->run();