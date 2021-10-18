<?php

namespace Media101\WeFactApi\Traits;

use Media101\WeFactApi\Exceptions\ApiException;


trait HasAttachments
{

    /**
     * Get base64 encoded attachment.
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public function getAttachment(string $fileName): array
    {
        $res = $this->request([
            'controller' => 'attachment',
            'type' => $this->controller,
            'action' => 'download',
            'Identifier' => $this->Identifer,
            'Filename' => $fileName,
        ]);



        return $res['success'];
    }

    /**
     * Add attachment file to creditor.
     * @param $fileName string the file name to save.
     * @param $base64 string string of the file.
     * @return \Media101\WeFactApi\Traits\HasAttachments
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     */
    public function addAttachement(string $fileName, string $base64): HasAttachments
    {
        $res = $this->request([
            'controller' => 'attachment',
            'type' => $this->controller,
            'action' => 'add',
            'Identifier' => $this->Identifier,
            'Filename' => $fileName,
            'Base64' => $base64,
        ]);



        return $this;
    }

    /**
     * Remove attachment file from creditor.
     * @param $fileName string the file to remove.
     * @return \Media101\WeFactApi\Traits\HasAttachments
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     */
    public function removeAttachment(string $fileName): HasAttachments
    {
        $res = $this->request([
            'controller' => 'attachment',
            'type' => $this->controller,
            'action' => 'delete',
            'Identifier' => $this->Identifier,
            'Filename' => $fileName,
        ]);



        return $this;
    }
}