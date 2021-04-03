<?php

use Emgag\VarnishTowncrier\Request;
use PHPUnit\Framework\TestCase;

/**
 * Class VarnishTowncrierTest.
 */
class VarnishTowncrierTest extends TestCase
{
    /**
     * Test if request object correctly serialize to JSON.
     */
    public function testSerialize()
    {
        $hostname = 'example.org';
        $json     = [];

        // ban
        $json[] = (string) (new Request\Ban($hostname, 'whatever'));
        $json[] = (string) (new Request\Ban($hostname, ['still', 'flying']));
        // ban.url
        $json[] = (string) (new Request\BanURL($hostname, 'whatever'));
        $json[] = (string) (new Request\BanURL($hostname, ['still', 'flying']));
        // purge
        $json[] = (string) (new Request\Purge($hostname, 'whatever'));
        $json[] = (string) (new Request\Purge($hostname, ['still', 'flying']));
        // xkey
        $json[] = (string) (new Request\Xkey($hostname, 'whatever'));
        $json[] = (string) (new Request\Xkey($hostname, ['still', 'flying']));
        // xkey.soft
        $json[] = (string) (new Request\XkeySoft($hostname, 'whatever'));
        $json[] = (string) (new Request\XkeySoft($hostname, ['still', 'flying']));

        // validate json
        foreach ($json as $request) {
            $validator = new \JsonSchema\Validator();
            $schema    = json_decode(
                file_get_contents(__DIR__.'/files/request.json'),
                JSON_THROW_ON_ERROR
            );

            $data = json_decode($request);
            $validator->validate($data, $schema);
            self::assertTrue($validator->isValid());
        }
    }

    /**
     * Test if basic request validation works.
     */
    public function testValidation()
    {
        $req = new Request\Ban('', []);
        self::assertFalse($req->isValid());

        $req = new Request\Ban('', 'value');
        self::assertTrue($req->isValid());

        $req = new Request\Ban('', ['value']);
        self::assertTrue($req->isValid());

        $req = new Request\Ban('host', []);
        self::assertFalse($req->isValid());

        $req = new Request\Ban('host', ['value']);
        self::assertTrue($req->isValid());
    }
}
