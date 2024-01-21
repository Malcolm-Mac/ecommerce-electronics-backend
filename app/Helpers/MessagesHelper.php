<?php


namespace App\Helpers;


class MessagesHelper
{
    public static function getNotFoundMessage($modelName): string{
        return $modelName.' not found.';
    }

    public static function getCreatedMessage($modelName): string{
        return $modelName.' created successfully.';
    }

    public static function getUpdatedMessage($modelName): string{
        return $modelName.' updated successfully.';
    }

    public static function getDeletedMessage($modelName): string{
        return $modelName.' deleted successfully.';
    }

    public static function getErrorMessage(): string{
        return 'An error occurred.';
    }

    public static function getValidationErrorMessage(): string{
        return 'Invalid inputs';
    }
}
