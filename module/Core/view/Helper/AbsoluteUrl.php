<?php

// ./module/Core/src/Core/View/Helper/AbsoluteUrl.php

namespace Core\View\Helper;

use Zend\Http\Request;
use Zend\View\Helper\AbstractHelper;

class AbsoluteUrl extends AbstractHelper {

    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function __invoke() {
        return $this->request->getUri()->normalize();
    }

//uso view The full URL to the current page is: <?php echo $this->absoluteUrl();
}
