<?php 

namespace App;

use App\Model\Post;

use App\CustomQuery;

class CommonFunctions {

    private $customQuery;

    public function __construct(CustomQuery $customQuery)
    {
        $this->customQuery = $customQuery;
    }

	public function getTrendingAticle($id)
	{
		$trending = Post::where('id','=',$id)->first();
        $trending->categories2 = $this->customQuery->getPostCategories($trending->id,false);
        
        return $trending;
	}

}