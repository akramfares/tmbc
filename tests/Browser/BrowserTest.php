<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class BrowserTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Home');
        });
    }

    /**
     * Create new comment.
     *
     * @return void
     */
    public function testCreateComment()
    {
        $this->browse(function (Browser $browser) {
            $browser->type('#inputName', 'Akram Fares');
            $browser->type('#inputComment', 'This is a test comment');
            $browser->click('#submitComment');
            $browser->waitFor('#comment-1');
            $browser->assertSee("Akram Fares");
        });
    }

    /**
     * Create reply to comment.
     *
     * @return void
     */
    public function testCreateReply()
    {
        $this->browse(function (Browser $browser) {
            $browser->click('#comment-1 > div.media-body > p:nth-child(3) > a');

            $browser->type('#comment-1 > div.media-body > form > div > div:nth-child(1) > input[type="text"]', 'Mick');
            $browser->type('#comment-1 > div.media-body > form > div > div.col-sm-8 > input', 'This is a test reply');
            $browser->click('#comment-1 > div.media-body > form > div > div:nth-child(3) > button');
            $browser->waitFor('#comment-2');
            $browser->assertVisible("#comment-2");
        });
    }

    /**
     * Create level 3 comment.
     *
     * @return void
     */
    public function testCreateSecondReply()
    {
        $this->browse(function (Browser $browser) {
            $browser->waitFor('#comment-2');
            $browser->click('#comment-2 > div.media-body > p:nth-child(3) > a');

            $selector = '#comment-2 > div.media-body > form > div > div:nth-child(1) > input[type="text"]';
            $browser->type($selector, 'Serena Williams');
            $selector = '#comment-2 > div.media-body > form > div > div.col-sm-8 > input';
            $browser->type($selector, 'This is a second test reply');
            $browser->click('#comment-2 > div.media-body > form > div > div:nth-child(3) > button');
            $browser->waitFor('#comment-3');
            $browser->assertVisible("#comment-3");

            // Assert reply button is missing when level 3
            $browser->assertMissing("#comment-3 > div.media-body > p:nth-child(3) > a");
        });
    }
}
