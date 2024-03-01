<?php

namespace App\Handler;

use Illuminate\Http\Request;
use Spatie\WebhookClient\Exceptions\WebhookFailed;
use Spatie\WebhookClient\WebhookConfig;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;

class WoocomerceSignature implements SignatureValidator
{
    public function isValid(Request $request, WebhookConfig $config): bool
    {
        $signature = $request->header($config->signatureHeaderName);
        if (!$signature) {
            return false;
        }
        $signingSecret = $config->signingSecret;


        $computedSignature = base64_encode(hash_hmac('sha256', $request->getContent(), $signingSecret, true));
        // $computedSignature = hash_hmac('sha256', $request->getContent(), $signingSecret);
        return hash_equals($signature, $computedSignature);
    }
}
