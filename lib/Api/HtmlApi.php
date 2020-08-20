<?php
/**
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 *  SOFTWARE.
 * php version 5.6
 *
 * @category  Aspose_Html_Cloud_SDK
 * @package   html-sdk-php
 * @author    Alexander Makogon <alexander.makogon@aspose.com>
 * @copyright 2020 Aspose
 * @license   https://opensource.org/licenses/mit-license.php  MIT License
 * @version   GIT: @20.8.0@
 * @link      https://packagist.org/packages/aspose/html-sdk-php
 */

namespace Client\Invoker\Api;

use Client\Invoker\Configuration;
use Client\Invoker\HeaderSelector;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use RuntimeException;

require_once 'ConversionApi.php';
require_once 'DocumentApi.php';
require_once 'TemplateMergeApi.php';
require_once 'ImportApi.php';


/**
 * Collecting all HtmlApi
 *
 * @category HtmlApi
 * @package  html-sdk-php
 * @author   Alexander Makogon <alexander.makogon@aspose.com>
 * @license  https://opensource.org/licenses/mit-license.php  MIT License
 * @link     https://packagist.org/packages/aspose/html-sdk-php
 */
class HtmlApi
{
    use ConversionApi, DocumentApi, TemplateMergeApi, ImportApi, SeoApi;

    /**
     * Http client
     *
     * @var ClientInterface
     */
    public $client;

    /**
     * Configuration endpoint and security
     *
     * @var Configuration
     */
    public $config;

    /**
     * Selector custom headers
     *
     * @var HeaderSelector
     */
    private $_headerSelector;

    /**
     * Create HtmlApi
     *
     * @param Configuration  $params   Configuration Api
     * @param HeaderSelector $selector Headers
     */
    public function __construct($params, HeaderSelector $selector = null)
    {
        $this->client = Configuration::getClient($params);
        $this->config = $params;
        $this->_headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * Create http client option
     *
     * @throws RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config['debug']) {
            $options[RequestOptions::DEBUG]
                = fopen($this->config['debugFile'], 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new RuntimeException(
                    'Failed to open the debug file: '
                    . $this->config['debugFile']
                );
            }
        }

        return $options;
    }
}