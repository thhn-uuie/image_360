<?php
namespace common\helper; //file is in utils folder of your application

use Symfony\Component\Messenger\Transport\TransportFactoryInterface;

class CustomSmtpFactory implements TransportFactoryInterface {
    public function __construct(private TransportFactoryInterface $factory, private float $timeout)
    {
        $this->timeout = 120;
    }

    public function create(Dsn $dsn): TransportInterface
    {
        $result = $this->factory->create($dsn);
        if ($result instanceof SmtpTransport) {
            //Setup timeout to this or
            $result->getStream()->setTimeout($this->timeout);
        }
        return $result;
    }

    public function supports(Dsn $dsn): bool {
        return $this->factory->supports($dsn);
    }
}