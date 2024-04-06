<?php
namespace Up\Services;
class PaginationService
{
    protected static function determinePage(int $pageNumber, array $paginationArray,int $count = 10): array
    {
        $pageArray = [];
        if ($pageNumber === 1)
        {
            $prevPage = 1;
        }
        else
        {
            $prevPage = $pageNumber - 1;
        }

        if (count($paginationArray) === $count)
        {
            $nextPage = $pageNumber + 1;
        }
        else
        {
            $nextPage = $pageNumber;
        }
        $pageArray[] = $prevPage;
        $pageArray[] = $nextPage;

        return ($pageArray);
    }

    protected static function trimPaginationArray(array $paginationArray, int $ArrayLimit = 10): array
    {
        $productArraySize = count($paginationArray);

        if ($productArraySize === $ArrayLimit)
        {
            array_pop($paginationArray);
        }

        return $paginationArray;
    }
    public static function getData(int $pageNumber,array $paginationArray,int $arrayLimit)
    {
        $pages=self::determinePage($pageNumber,$paginationArray,$arrayLimit);
        $array=self::trimPaginationArray($paginationArray,$arrayLimit);
        return[$array,$pages];
    }
}


?>