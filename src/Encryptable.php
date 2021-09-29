<?php

namespace PaulhenriL\LaravelEncryptable;

use Illuminate\Support\Facades\Crypt;

trait Encryptable
{
    /**
     * Get an attribute from the model while decrypting it if needed.
     *
     * @param string $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if ($value != null && $this->isEncrypted($key)) {
            $value = Crypt::decrypt($value);
        }

        return $value;
    }

    /**
     * Set a given attribute on the model while encrypting it if needed.
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function setAttribute($key, $value)
    {
        if ($this->isEncrypted($key)) {
            $value = Crypt::encrypt($value);
        }

        parent::setAttribute($key, $value);
    }

    /**
     * Check if the given field is encrypted.
     *
     * @param string $key
     * @return bool
     */
    protected function isEncrypted(string $key): bool
    {
        return in_array($key, $this->getEncryptedFields());
    }

    /**
     * Return the list of encrypted fields.
     *
     * @return array
     */
    protected function getEncryptedFields(): array
    {
        return property_exists($this, 'encryptedFields')
            ? $this->encryptedFields
            : [];
    }
}
