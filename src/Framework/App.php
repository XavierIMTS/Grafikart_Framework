<?php
/**
 * Framework
 *  PHP Version 7
 *
 * @category    PHP
 * @link        Framework
 * @author      Your Name <you@domain.net>
 * @package     src/Framework
 */
namespace Framework;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * This sniff prohibits the use of Perl style hash comments.
 *
 * An example of a hash comment is:
 *
 * <code>
 *  # This is a hash comment, which is prohibited.
 *  $hello = 'hello';
 * </code>
 *
 * @category    PHP
 * @package     PHP_Framework
 * @author      Your Name <you@domain.net>
 * @license     http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @version     Release: @package_version@
 * @link        http://pear.php.net/package/PHP_CodeSniffer
 */
class App
{
    /**
     * Function Run
     *
     * @return Response
     */
    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();
        if (!empty($uri) && $uri[-1] === "/") {
            return (new Response())
                ->withStatus(301)
                ->withHeader('Location', substr($uri, 0, -1));
        }

        if ($uri === '/blog') {
            return new Response(200, [], '<h1>Bienvenue sur le blog</h1>');
        }
        return  new Response(404, [], '<h1>Erreur 404</h1>');
    }//end run()
}
