<?php
namespace TestBundle\Components;

use Symfony\Component\DependencyInjection\Container;

/**
 * Component photo
 */
class Photo
{
    protected $container;

    protected $doFlush;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Move uploaded file
     *
     * @param Entity\Photo $entity
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
     */
    public function move($entity, $file)
    {
        if ($file) {
            $entity->setName($file->getClientOriginalName());
            $entity->setExtension($file->guessExtension());

            $file->move(
                $this->container->get('kernel')->getRootDir() . '/../web/upload',
                $entity->getId() . '.' . $file->guessExtension()
            );
        }
    }
}