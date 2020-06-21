# What we will learn in Makrdown tutorial

## Topics

What we will **learn** in this *tutorial* as following ^up^ word and ~down~ ~~word~~ 

* text format
* list
* tables
* url
* images
* code
  * c++ preview
  * python preview
* how to add line

1. task1
2. task 2
3. task3 
___
| Name | code | email |
|-----|----|----|
|abdallah|01|abdallah@simply.com|
|mohamed|02|mohamed@simply.com|
___
What do you think

[Google Site](http://google.com)
![Google icon](https://www.iconfinder.com/icons/1298745/download/png/64)

---
[Youtube Site](http://youtube.com)
![Youtube icon](http://icons.iconarchive.com/icons/dakirby309/simply-styled/64/YouTube-icon.png)
___
[MarkDown Tuto](https://www.youtube.com/watch?v=sqYYLWSPJno)
[Youtube icon](https://cdn.iconscout.com/icon/premium/png-64-thumb/markdown-7-600700.png)
___

## Python language test

```python
# comment
def sum(x,y):
    return x+y
```

## C++ example 

```c
// comment
int sum (int x, int y){
    return x+y;
}
```
## symfony example 


```
<?php

namespace App\Controller;

use App\Entity\BlogPost;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog")
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/add", name="Blog_Add",methods={"POST"})
     */
    public function add(Request $request)
    {
        //var_dump("here");die;
        $serializer = $this->get('serializer');
        $Post= $serializer->deserialize($request->getContent(),BlogPost::class,'json');
        $em=$this->getDoctrine()->getManager();
        $em->persist($Post);
        $em->flush();
        return  $this->json($Post);
    }
```


