/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-07-26 12:39:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_admin
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin`;
CREATE TABLE `blog_admin` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `adminname` varchar(32) NOT NULL DEFAULT '' COMMENT '管理员名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `input_id` int(10) NOT NULL DEFAULT '0' COMMENT '录入人员Id',
  `token` varchar(20) NOT NULL DEFAULT '0' COMMENT 'token',
  `deleted_at` tinyint(5) NOT NULL DEFAULT '0',
  `role_id` tinyint(5) NOT NULL DEFAULT '0' COMMENT '角色ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `adminname` (`adminname`),
  KEY `role_id` (`role_id`) COMMENT '角色'
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
INSERT INTO `blog_admin` VALUES ('1', 'ycp', '447910ff7241c373129b8761cc312c78', 'http://oskmbo3g0.bkt.clouddn.com/2017/07/17-14:53:19-/dS3Rx22BQb1Nxp8qGKe8XMPULBOj5Qm1jD70WqmM.jpeg', '', '1498118813', '1500274401', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('20', 'test2ssdkfffff', '79729544f5269e36f51cf9c18b1a9a72', '', '', '1496653451', '1499161319', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('27', 'test2ssrrr', 'fed6fb05c04e7e31bc5a91b25834281f', '', '', '1496818749', '1496823066', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('28', 'afafa', '220a942773547a88f1aa3b73938103f5', '', '', '1496818812', '1496818812', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('29', 'afafad', '220a942773547a88f1aa3b73938103f5', '', '', '1496818822', '1496818822', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('30', 'fa22233333ff', 'a964973f5c5d142c6c23c6809d8bfd46', '', '', '1496818829', '1498816152', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('33', 'test', 'cb3b3845bf2402c6f436aac097332517', '', '', '1498188532', '1498203875', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('35', 'dd', 'cfcda2fb6e3d1f00505962a486e9c5ae', '', '', '1498201721', '1498201721', '0', '0', '0', '0');
INSERT INTO `blog_admin` VALUES ('36', 'test_blog', 'fed6fb05c04e7e31bc5a91b25834281f', 'http://oskmbo3g0.bkt.clouddn.com/2017/07/14-17:57:34-/BLSXBaSrIRQ3vV231hAXCL0pJrz1ahjwzloW0AqS.jpeg', '', '1500026032', '1500026256', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for blog_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin_role`;
CREATE TABLE `blog_admin_role` (
  `admin_id` mediumint(9) NOT NULL COMMENT '管理员Id',
  `role_id` mediumint(9) NOT NULL COMMENT '角色Id',
  KEY `admin_id` (`admin_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员角色表';

-- ----------------------------
-- Records of blog_admin_role
-- ----------------------------
INSERT INTO `blog_admin_role` VALUES ('29', '4');
INSERT INTO `blog_admin_role` VALUES ('20', '4');
INSERT INTO `blog_admin_role` VALUES ('78', '5');
INSERT INTO `blog_admin_role` VALUES ('20', '5');
INSERT INTO `blog_admin_role` VALUES ('1', '1');
INSERT INTO `blog_admin_role` VALUES ('33', '6');
INSERT INTO `blog_admin_role` VALUES ('36', '7');

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `intro` varchar(255) NOT NULL DEFAULT '' COMMENT '简介',
  `content` text NOT NULL COMMENT '内容',
  `cat_id` int(10) NOT NULL DEFAULT '0',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `input_id` int(10) NOT NULL DEFAULT '0' COMMENT '录入人员Id',
  `deleted_at` tinyint(5) NOT NULL DEFAULT '0',
  `views` tinyint(5) NOT NULL DEFAULT '0' COMMENT '访问次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('39', '通过 Quarx 扩展包在任意 Laravel 应用中快速实现 CMS 功能', 'ddd', '![\\3fc8df313a6edcfc93b0429fcb127b1a.jpg][0.00934975749531719]dddd\r\n\r\n  [0.00934975749531719]: http://www.blog.com/uploads/2017-07-11/8969e3d3b6f89de9beaf908dec3abdee.jpg', '41', '1499759897', '1500367879', '1', '1', '0');
INSERT INTO `blog_article` VALUES ('52', 'qiantai测试', '', '工欲善其事，必先利其器。在开发Xblog的过程中，稍微领悟了一点Laravel的思想。确实如此，这篇文章读完你可能并不能从无到有写出一个博客，但知道Laravel的核心概念之后，当你再次写起Laravel时，会变得一目了然胸有成竹。\r\n\r\nPHP的生命周期\r\n\r\n万物皆有他的生命周期。熟悉Android的同学一定熟悉Android最经典的Activity的生命周期，Laravel 也不例外，Laravel应用程序也有自己的生命周期。Laravel是什么？一个PHP框架。所以要想真正说清Laravel的生命周期，必须说清PHP的生命周期。原文参考这里，这里做个总结。\r\n\r\nPhp有两种运行模式，WEB模式和CLI（命令行）模式。当我们在终端敲入php这个命令的时候，使用的是CLI模式；当使用Nginx或者别web服务器作为宿主处理一个到来的请求时，会调用Php运行，此时使用的是WEB模式。当我们请求一个Php文件时，比如Laravel 的public\\index.php文件时，Php 为了完成这次请求，会发生5个阶段的生命周期切换：\r\n\r\n模块初始化（MINIT），即调用php.ini中指明的扩展的初始化函数进行初始化工作，如mysql扩展。\r\n请求初始化（RINIT），即初始化为执行本次脚本所需要的变量名称和变量值内容的符号表，如$_SESSION变量。\r\n执行该PHP脚本。\r\n请求处理完成(Request Shutdown)，按顺序调用各个模块的RSHUTDOWN方法，对每个变量调用unset函数，如unset $_SESSION变量。\r\n关闭模块(Module Shutdown) ， PHP调用每个扩展的MSHUTDOWN方法，这是各个模块最后一次释放内存的机会。这意味着没有下一个请求了。\r\nWEB模式和CLI（命令行）模式很相似，区别是：CLI 模式会在每次脚本执行经历完整的5个周期，因为你脚本执行完不会有下一个请求；而WEB模式为了应对并发，可能采用多线程，因此生命周期1和5有可能只执行一次，下次请求到来时重复2-4的生命周期，这样就节省了系统模块初始化所带来的开销。\r\n\r\n可以看到，Php生命周期是很对称的。说了这么多，就是为了定位Laravel运行在哪里，没错，Laravel仅仅运行再第三个阶段：\r\n\r\nfile\r\n\r\n知道这些有什么用？你可以优化你的Laravel代码，可以更加深入的了解Larave的singleton（单例）。至少你知道了，每一次请求结束，Php的变量都会unset，Laravel的singleton只是在某一次请求过程中的singleton；你在Laravel 中的静态变量也不能在多个请求之间共享，因为每一次请求结束都会unset。理解这些概念，是写高质量代码的第一步，也是最关键的一步。因此记住，Php是一种脚本语言，所有的变量只会在这一次请求中生效，下次请求之时已被重置，而不像Java静态变量拥有全局作用。\r\n\r\n好了，开始Laravel的生命周期。\r\n\r\nLaravel的生命周期\r\n\r\n概述\r\nLaravel 的生命周期从public\\index.php开始，从public\\index.php结束。\r\n\r\nfile\r\n\r\n注意：以下几图箭头均代表Request流向\r\n\r\n这么说有点草率，但事实确实如此。下面是public\\index.php的全部源码（Laravel源码的注释是最好的Laravel文档），更具体来说可以分为四步：\r\n\r\n1. require __DIR__.\'/../bootstrap/autoload.php\';\r\n\r\n2. $app = require_once __DIR__.\'/../bootstrap/app.php\';\r\n   $kernel = $app->make(Illuminate\\Contracts\\Http\\Kernel::class);\r\n\r\n3. $response = $kernel->handle(\r\n    $request = Illuminate\\Http\\Request::capture()\r\n   );\r\n   $response->send();\r\n\r\n4. $kernel->terminate($request, $response);\r\n这四步详细的解释是：\r\n\r\n1.注册加载composer自动生成的class loader，包括所有你composer require的依赖（对应代码1）.\r\n2.生成容器Container，Application实例，并向容器注册核心组件（HttpKernel，ConsoleKernel，ExceptionHandler）（对应代码2，容器很重要，后面详细讲解）。\r\n3.处理请求，生成并发送响应（对应代码3，毫不夸张的说，你99%的代码都运行在这个小小的handle方法里面）。\r\n4.请求结束，进行回调（对应代码4，还记得可终止中间件吗？没错，就是在这里回调的）。\r\n\r\nfile\r\n\r\n启动Laravel基础服务\r\n我们不妨再详细一点：\r\n\r\n第一步注册加载composer自动生成的class loader就是加载初始化第三方依赖，不属于Laravel核心，到此为止。\r\n\r\n第二步生成容器Container，并向容器注册核心组件，这里牵涉到了容器Container和合同Contracts，这是Laravel的重点，下面将详细讲解。\r\n\r\n重点是第三步处理请求，生成并发送响应。\r\n首先Laravel框架捕获到用户发到public\\index.php的请求，生成Illuminate\\Http\\Request实例，传递给这个小小的handle方法。在方法内部，将该$request实例绑定到第二步生成的$app容器上。然后在该请求真正处理之前，调用bootstrap方法，进行必要的加载和注册，如检测环境，加载配置，注册Facades（假象），注册服务提供者，启动服务提供者等等。这是一个启动数组，具体在Illuminate\\Foundation\\Http\\Kernel中，包括：\r\n\r\nprotected $bootstrappers = [\r\n        \'Illuminate\\Foundation\\Bootstrap\\DetectEnvironment\',\r\n        \'Illuminate\\Foundation\\Bootstrap\\LoadConfiguration\',\r\n        \'Illuminate\\Foundation\\Bootstrap\\ConfigureLogging\',\r\n        \'Illuminate\\Foundation\\Bootstrap\\HandleExceptions\',\r\n        \'Illuminate\\Foundation\\Bootstrap\\RegisterFacades\',\r\n        \'Illuminate\\Foundation\\Bootstrap\\RegisterProviders\',\r\n        \'Illuminate\\Foundation\\Bootstrap\\BootProviders\',\r\n    ];\r\n看类名知意，Laravel是按顺序遍历执行注册这些基础服务的，注意顺序：Facades先于ServiceProviders，Facades也是重点，后面说，这里简单提一下，注册Facades就是注册config\\app.php中的aliases 数组，你使用的很多类，如Auth，Cache,DB等等都是Facades；而ServiceProviders的register方法永远先于boot方法执行，以免产生boot方法依赖某个实例而该实例还未注册的现象。\r\n\r\n所以，你可以在ServiceProviders的register方法中使用任何Facades，在ServiceProviders的boot方法中使用任何register方法中注册的实例或者Facades，这样绝不会产生依赖某个类而未注册的现象。\r\n\r\n将请求传递给路由\r\n注意到目前为止，Laravel 还没有执行到你所写的主要代码（ServiceProviders中的除外），因为还没有将请求传递给路由。\r\n\r\n在Laravel基础的服务启动之后，就要把请求传递给路由了。传递给路由是通过Pipeline（另开篇章讲解）来传递的，但是Pipeline有一堵墙，在传递给路由之前所有请求都要经过，这堵墙定义在app\\Http\\Kernel.php中的$middleware数组中，没错就是中间件，默认只有一个CheckForMaintenanceMode中间件，用来检测你的网站是否暂时关闭。这是一个全局中间件，所有请求都要经过，你也可以添加自己的全局中间件。\r\n\r\n然后遍历所有注册的路由，找到最先符合的第一个路由，经过它的路由中间件，进入到控制器或者闭包函数，执行你的具体逻辑代码。\r\n\r\n所以，在请求到达你写的代码之前，Laravel已经做了大量工作，请求也经过了千难万险，那些不符合或者恶意的的请求已被Laravel隔离在外。\r\n\r\nfile\r\n\r\n服务容器\r\n\r\n服务容器就是一个普通的容器，用来装类的实例，然后在需要的时候再取出来。用更专业的术语来说是服务容器实现了控制反转（Inversion of Control，缩写为IoC），意思是正常情况下类A需要一个类B的时候，我们需要自己去new类B，意味着我们必须知道类B的更多细节，比如构造函数，随着项目的复杂性增大，这种依赖是毁灭性的。控制反转的意思就是，将类A主动获取类B的过程颠倒过来变成被动，类A只需要声明它需要什么，然后由容器提供。\r\n\r\nfile\r\n\r\n这样做的好处是，类A不依赖于类B的实现，这样在一定程度上解决了耦合问题。\r\n\r\n在Laravel的服务容器中，为了实现控制反转，可以有以下两种：\r\n\r\n依赖注入（Dependency Injection）。\r\n绑定。\r\n依赖注入\r\n依赖注入是一种类型提示，举官网的例子：\r\n\r\nclass UserController extends Controller\r\n{\r\n    /**\r\n     * The user repository implementation.\r\n     *\r\n     * @var UserRepository\r\n     */\r\n    protected $users;\r\n\r\n    /**\r\n     * Create a new controller instance.\r\n     *\r\n     * @param  UserRepository  $users\r\n     * @return void\r\n     */\r\n    public function __construct(UserRepository $users)\r\n    {\r\n        $this->users = $users;\r\n    }\r\n\r\n    /**\r\n     * Show the profile for the given user.\r\n     *\r\n     * @param  int  $id\r\n     * @return Response\r\n     */\r\n    public function show($id)\r\n    {\r\n        $user = $this->users->find($id);\r\n\r\n        return view(\'user.profile\', [\'user\' => $user]);\r\n    }\r\n}\r\n这里UserController需要一个UserRepository实例，我们只需在构造方法中声明我们需要的类型，容器在实例化UserController时会自动生成UserRepository的实例（或者实现类，因为UserRepository可以为接口），而不用主动去获取UserRepository的实例，这样也就避免了了解UserRepository的更多细节，也不用解决UserRepository所产生的依赖，我们所做的仅仅是声明我们所需要的类型，所有的依赖问题都交给容器去解决。（Xblog使用了Repository的是设计模式，大家可以参考）\r\n\r\n绑定\r\n绑定操作一般在ServiceProviders中的register方法中，最基本的绑定是容器的bind方法，它接受一个类的别名或者全名和一个闭包来获取实例：\r\n\r\n$this->app->bind(\'XblogConfig\', function ($app) {\r\n    return new MapRepository();\r\n});\r\n还有一个singleton方法，和bind写法没什么区别。你也可以绑定一个已经存在的对象到容器中，上文中提到的request实例就是通过这种方法绑定到容器的：$this->app->instance(\'request\', $request);。绑定之后，我们可以通过一下几种方式来获取绑定实例：\r\n\r\n1.  app(\'XblogConfig\');\r\n\r\n2.  app()->make(\'XblogConfig\');\r\n\r\n3.  app()[\'XblogConfig\'];\r\n\r\n4.  resolve(\'XblogConfig\');\r\n以上四种方法均会返回获得MapRepository的实例，唯一的区别是，在一次请求的生命周期中，bind方法的闭包会在每一次调用以上四种方法时执行，singleton方法的闭包只会执行一次。在使用中，如果每一个类要获的不同的实例，或者需要“个性化”的实例时，这时我们需要用bind方法以免这次的使用对下次的使用造成影响；如果实例化一个类比较耗时或者类的方法不依赖该生成的上下文，那么我们可以使用singleton方法绑定。singleton方法绑定的好处就是，如果在一次请求中我们多次使用某个类，那么只生成该类的一个实例将节省时间和空间。\r\n\r\n你也可以绑定接口与实现，例如：\r\n\r\n$app->singleton(\r\n    Illuminate\\Contracts\\Http\\Kernel::class,\r\n    App\\Http\\Kernel::class\r\n);\r\n上文讲述的Laravel的生命周期的第二步，Laravel默认（在bootstrap\\app.php文件中）绑定了Illuminate\\Contracts\\Http\\Kernel，Illuminate\\Contracts\\Console\\Kernel，Illuminate\\Contracts\\Debug\\ExceptionHandler接口的实现类，这些是实现类框架的默认自带的。但是你仍然可以自己去实现。\r\n\r\n还有一种上下文绑定，就是相同的接口，在不同的类中可以自动获取不同的实现，例如：\r\n\r\n$this->app->when(PhotoController::class)\r\n          ->needs(Filesystem::class)\r\n          ->give(function () {\r\n              return Storage::disk(\'local\');\r\n          });\r\n\r\n$this->app->when(VideoController::class)\r\n          ->needs(Filesystem::class)\r\n          ->give(function () {\r\n              return Storage::disk(\'s3\');\r\n          });\r\n上述表明，同样的接口Filesystem，使用依赖注入时，在PhotoController中获取的是local存储而在VideoController中获取的是s3存储。\r\n\r\nContracts & Facades（合同&假象）\r\n\r\nLaravel 还有一个强大之处是，比如你只需在配置文件中指明你需要的缓存驱动（redis，memcached，file......），Laravel 就自动办你切换到这种驱动，而不需要你针对某种驱动更改逻辑和代码。Why? 很简单，Laravel定义了一系列Contracts（翻译：合同），本质上是一系列PHP接口，一系列的标准，用来解耦具体需求对实现的依赖关系。其实真正强大的公司是制定标准的公司，程序也是如此，好的标准（接口）尤为重要。当程序变得越来大，这种通过合同或者接口来解耦所带来的可扩展性和可维护性是无可比拟的。\r\n\r\nfile\r\n\r\n上图不使用Contracts的情况下，对于一种逻辑，我们只能得到一种结果（方块），如果变更需求，意味着我们必须重构代码和逻辑。但是在使用Contracts的情况下，我们只需要按照接口写好逻辑，然后提供不同的实现，就可以在不改动代码逻辑的情况下获得更加多态的结果。\r\n\r\n这么说有点抽象，举一个真实的例子。在完成Xblog的初期，我使用了缓存，所以导致Repository中充满了和cache相关的方法：remember，flush，forget等等。后来国外网友反映，简单的博客并不一定需要缓存。所以我决定把它变成可选，但因为代码中充满和cache相关的方法，实现起来并不是很容易。于是想起Laravel的重要概念Contracts。于是，我把与缓存有关的方法抽象出来形成一个Contracts:XblogCache，实际操作只与Contracts有关，这样问题就得到了解决，而几乎没有改变原有的逻辑。XblogCache的代码如下（源码点击这里）:\r\n\r\nnamespace App\\Contracts;\r\nuse Closure;\r\ninterface XblogCache\r\n{\r\n    public function setTag($tag);\r\n    public function setTime($time_in_minute);\r\n    public function remember($key, Closure $entity, $tag = null);\r\n    public function forget($key, $tag = null);\r\n    public function clearCache($tag = null);\r\n    public function clearAllCache();\r\n}\r\n然后，我又完成了两个实现类：Cacheable和NoCache：\r\n\r\n实现具体缓存。\r\n\r\nclass Cacheable implements XblogCache\r\n{\r\npublic $tag;\r\npublic $cacheTime;\r\npublic function setTag($tag)\r\n{\r\n    $this->tag = $tag;\r\n}\r\npublic function remember($key, Closure $entity, $tag = null)\r\n{\r\n    return cache()->tags($tag == null ? $this->tag : $tag)->remember($key, $this->cacheTime, $entity);\r\n}\r\npublic function forget($key, $tag = null)\r\n{\r\n    cache()->tags($tag == null ? $this->tag : $tag)->forget($key);\r\n}\r\npublic function clearCache($tag = null)\r\n{\r\n    cache()->tags($tag == null ? $this->tag : $tag)->flush();\r\n}\r\npublic function clearAllCache()\r\n{\r\n    cache()->flush();\r\n}\r\npublic function setTime($time_in_minute)\r\n{\r\n    $this->cacheTime = $time_in_minute;\r\n}\r\n}\r\n不缓存。\r\nclass NoCache implements XblogCache\r\n{\r\npublic function setTag($tag)\r\n{\r\n    // Do Nothing\r\n}\r\npublic function setTime($time_in_minute)\r\n{\r\n    // Do Nothing\r\n}\r\npublic function remember($key, Closure $entity, $tag = null)\r\n{\r\n    /**\r\n     * directly return\r\n     */\r\n    return $entity();\r\n}\r\npublic function forget($key, $tag = null)\r\n{\r\n    // Do Nothing\r\n}\r\npublic function clearCache($tag = null)\r\n{\r\n    // Do Nothing\r\n}\r\npublic function clearAllCache()\r\n{\r\n    // Do Nothing\r\n}\r\n}\r\n然后再利用容器的绑定，根据不同的配置，返回不同的实现（源码）：\r\n\r\npublic function register()\r\n{\r\n        $this->app->bind(\'XblogCache\', function ($app) {\r\n            if (config(\'cache.enable\') == \'true\') {\r\n                return new Cacheable();\r\n            } else {\r\n                return new NoCache();\r\n            }\r\n        });\r\n}\r\n这样，就实现了缓存的切换而不需要更改你的具体逻辑代码。当然依靠接口而不依靠具体实现的好处不仅仅这些。实际上，Laravel所有的核心服务都是实现了某个Contracts接口（都在Illuminate\\Contracts\\文件夹下面），而不是依赖具体的实现，所以完全可以在不改动框架的前提下，使用自己的代码改变Laravel框架核心服务的实现方式。\r\n\r\n说一说Facades。在我们学习了容器的概念后，Facades就变得十分简单了。在我们把类的实例绑定到容器的时候相当于给类起了个别名，然后覆盖Facade的静态方法getFacadeAccessor并返回你的别名，然后你就可以使用你自己的Facade的静态方法来调用你绑定类的动态方法了。其实Facade类利用了__callStatic() 这个魔术方法来延迟调用容器中的对象的方法，这里不过多讲解，你只需要知道Facade实现了将对它调用的静态方法映射到绑定类的动态方法上，这样你就可以使用简单类名调用而不需要记住长长的类名。这也是Facades的中文翻译为假象的原因。\r\n\r\n总结\r\n\r\nLaravel强大之处不仅仅在于它给你提供了一系列脚手架，比如超级好用的ORM，基于Carbon的时间处理，以及文件存储等等功能。但是Laravel的核心非常非常简单：利用容器和抽象解耦，实现高扩展性。容器和抽象是所有大型框架必须解决的问题，像Java的Spring，Android的Dagger2等等都是围绕这几个问题的。所以本质上讲，Laravel之所以强大出名，是因为它的设计，思想，可扩展性。而Laravel的好用功能只是官方基于这些核心提供的脚手架，你同样也可以很轻松的添加自己的脚手架。\r\n\r\n所以不要觉得Laravel强大是因为他提供的很多功能，而是它的设计模式和思想。\r\n\r\n理解Laravel生命周期和请求的生命周期概念。\r\n所有的静态变量和单例，在下一个请求到来时都会重新初始化。\r\n将耗时的类或者频繁使用的类用singleton绑定。\r\n将变化选项的抽象为Contracts，依赖接口不依赖具体实现。\r\n善于利用Laravel提供的容器。\r\n参考：\r\n\r\n深入理解php底层：php生命周期\r\nLaravel 官方文档\r\nlaravel/framework\r\n-- END', '40', '1500278433', '1500278474', '1', '1', '0');
INSERT INTO `blog_article` VALUES ('48', 'test_17', '', 'ddd', '40', '1500255777', '1500256508', '1', '1', '0');
INSERT INTO `blog_article` VALUES ('49', 'test_17', '', 'ddd', '40', '1500255804', '1500256351', '1', '1', '0');
INSERT INTO `blog_article` VALUES ('50', 'test_17', '', 'ddd', '40', '1500255833', '1500256494', '1', '1', '0');
INSERT INTO `blog_article` VALUES ('51', '使用 Jigsaw 扩展包基于 Laravel Blade 模板构建静态站点 —— 安装预览篇', '', 'fff\r\n```php\r\n<?php\r\n\r\nnamespace App;\r\n\r\nuse Laravel\\Scout\\Searchable;\r\nuse Illuminate\\Database\\Eloquent\\Model;\r\n\r\nclass Post extends Model\r\n{\r\n    use Searchable;\r\n\r\n    /**\r\n     * 得到该模型可索引数据的数组。\r\n     *\r\n     * @return array\r\n     */\r\n    public function toSearchableArray()\r\n    {\r\n        $array = $this->toArray();\r\n\r\n        // 自定义数组数据...\r\n\r\n        return $array;\r\n    }\r\n}\r\n```', '42', '1500255870', '1500427802', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('53', 'qiantai测试', '', '工欲善其事，必先利其器。在开发Xblog的过程中，稍微领悟了一点Laravel的思想。确实如此，这篇文章读完你可能并不能从无到有写出一个博客，但知道Laravel的核心概念之后，当你再次写起Laravel时，会变得一目了然胸有成竹。\r\n\r\nPHP的生命周期\r\n\r\n万物皆有他的生命周期。熟悉Android的同学一定熟悉Android最经典的Activity的生命周期，Laravel 也不例外，Laravel应用程序也有自己的生命周期。Laravel是什么？一个PHP框架。所以要想真正说清Laravel的生命周期，必须说清PHP的生命周期。原文参考这里，这里做个总结。\r\n\r\nPhp有两种运行模式，WEB模式和CLI（命令行）模式。当我们在终端敲入php这个命令的时候，使用的是CLI模式；当使用Nginx或者别web服务器作为宿主处理一个到来的请求时，会调用Php运行，此时使用的是WEB模式。当我们请求一个Php文件时，比如Laravel 的public\\index.php文件时，Php 为了完成这次请求，会发生5个阶段的生命周期切换：\r\n\r\n模块初始化（MINIT），即调用php.ini中指明的扩展的初始化函数进行初始化工作，如mysql扩展。\r\n请求初始化（RINIT），即初始化为执行本次脚本所需要的变量名称和变量值内容的符号表，如$_SESSION变量。\r\n执行该PHP脚本。\r\n请求处理完成(Request Shutdown)，按顺序调用各个模块的RSHUTDOWN方法，对每个变量调用unset函数，如unset $_SESSION变量。\r\n关闭模块(Module Shutdown) ， PHP调用每个扩展的MSHUTDOWN方法，这是各个模块最后一次释放内存的机会。这意味着没有下一个请求了。\r\nWEB模式和CLI（命令行）模式很相似，区别是：CLI 模式会在每次脚本执行经历完整的5个周期，因为你脚本执行完不会有下一个请求；而WEB模式为了应对并发，可能采用多线程，因此生命周期1和5有可能只执行一次，下次请求到来时重复2-4的生命周期，这样就节省了系统模块初始化所带来的开销。\r\n\r\n可以看到，Php生命周期是很对称的。说了这么多，就是为了定位Laravel运行在哪里，没错，Laravel仅仅运行再第三个阶段：\r\n\r\nfile\r\n\r\n知道这些有什么用？你可以优化你的Laravel代码，可以更加深入的了解Larave的singleton（单例）。至少你知道了，每一次请求结束，Php的变量都会unset，Laravel的singleton只是在某一次请求过程中的singleton；你在Laravel 中的静态变量也不能在多个请求之间共享，因为每一次请求结束都会unset。理解这些概念，是写高质量代码的第一步，也是最关键的一步。因此记住，Php是一种脚本语言，所有的变量只会在这一次请求中生效，下次请求之时已被重置，而不像Java静态变量拥有全局作用。\r\n\r\n好了，开始Laravel的生命周期。\r\n\r\nLaravel的生命周期\r\n\r\n概述\r\nLaravel 的生命周期从public\\index.php开始，从public\\index.php结束。\r\n\r\nfile\r\n\r\n注意：以下几图箭头均代表Request流向\r\n\r\n这么说有点草率，但事实确实如此。下面是public\\index.php的全部源码（Laravel源码的注释是最好的Laravel文档），更具体来说可以分为四步：\r\n\r\n1. require __DIR__.\'/../bootstrap/autoload.php\';\r\n\r\n2. $app = require_once __DIR__.\'/../bootstrap/app.php\';\r\n   $kernel = $app->make(Illuminate\\Contracts\\Http\\Kernel::class);\r\n\r\n3. $response = $kernel->handle(\r\n    $request = Illuminate\\Http\\Request::capture()\r\n   );\r\n   $response->send();\r\n\r\n4. $kernel->terminate($request, $response);\r\n这四步详细的解释是：\r\n\r\n1.注册加载composer自动生成的class loader，包括所有你composer require的依赖（对应代码1）.\r\n2.生成容器Container，Application实例，并向容器注册核心组件（HttpKernel，ConsoleKernel，ExceptionHandler）（对应代码2，容器很重要，后面详细讲解）。\r\n3.处理请求，生成并发送响应（对应代码3，毫不夸张的说，你99%的代码都运行在这个小小的handle方法里面）。\r\n4.请求结束，进行回调（对应代码4，还记得可终止中间件吗？没错，就是在这里回调的）。\r\n\r\nfile\r\n\r\n启动Laravel基础服务\r\n我们不妨再详细一点：\r\n\r\n第一步注册加载composer自动生成的class loader就是加载初始化第三方依赖，不属于Laravel核心，到此为止。\r\n\r\n第二步生成容器Container，并向容器注册核心组件，这里牵涉到了容器Container和合同Contracts，这是Laravel的重点，下面将详细讲解。\r\n\r\n重点是第三步处理请求，生成并发送响应。\r\n首先Laravel框架捕获到用户发到public\\index.php的请求，生成Illuminate\\Http\\Request实例，传递给这个小小的handle方法。在方法内部，将该$request实例绑定到第二步生成的$app容器上。然后在该请求真正处理之前，调用bootstrap方法，进行必要的加载和注册，如检测环境，加载配置，注册Facades（假象），注册服务提供者，启动服务提供者等等。这是一个启动数组，具体在Illuminate\\Foundation\\Http\\Kernel中，包括：\r\n\r\nprotected $bootstrappers = [\r\n        \'Illuminate\\Foundation\\Bootstrap\\DetectEnvironment\',\r\n        \'Illuminate\\Foundation\\Bootstrap\\LoadConfiguration\',\r\n        \'Illuminate\\Foundation\\Bootstrap\\ConfigureLogging\',\r\n        \'Illuminate\\Foundation\\Bootstrap\\HandleExceptions\',\r\n        \'Illuminate\\Foundation\\Bootstrap\\RegisterFacades\',\r\n        \'Illuminate\\Foundation\\Bootstrap\\RegisterProviders\',\r\n        \'Illuminate\\Foundation\\Bootstrap\\BootProviders\',\r\n    ];\r\n看类名知意，Laravel是按顺序遍历执行注册这些基础服务的，注意顺序：Facades先于ServiceProviders，Facades也是重点，后面说，这里简单提一下，注册Facades就是注册config\\app.php中的aliases 数组，你使用的很多类，如Auth，Cache,DB等等都是Facades；而ServiceProviders的register方法永远先于boot方法执行，以免产生boot方法依赖某个实例而该实例还未注册的现象。\r\n\r\n所以，你可以在ServiceProviders的register方法中使用任何Facades，在ServiceProviders的boot方法中使用任何register方法中注册的实例或者Facades，这样绝不会产生依赖某个类而未注册的现象。\r\n\r\n将请求传递给路由\r\n注意到目前为止，Laravel 还没有执行到你所写的主要代码（ServiceProviders中的除外），因为还没有将请求传递给路由。\r\n\r\n在Laravel基础的服务启动之后，就要把请求传递给路由了。传递给路由是通过Pipeline（另开篇章讲解）来传递的，但是Pipeline有一堵墙，在传递给路由之前所有请求都要经过，这堵墙定义在app\\Http\\Kernel.php中的$middleware数组中，没错就是中间件，默认只有一个CheckForMaintenanceMode中间件，用来检测你的网站是否暂时关闭。这是一个全局中间件，所有请求都要经过，你也可以添加自己的全局中间件。\r\n\r\n然后遍历所有注册的路由，找到最先符合的第一个路由，经过它的路由中间件，进入到控制器或者闭包函数，执行你的具体逻辑代码。\r\n\r\n所以，在请求到达你写的代码之前，Laravel已经做了大量工作，请求也经过了千难万险，那些不符合或者恶意的的请求已被Laravel隔离在外。\r\n\r\nfile\r\n\r\n服务容器\r\n\r\n服务容器就是一个普通的容器，用来装类的实例，然后在需要的时候再取出来。用更专业的术语来说是服务容器实现了控制反转（Inversion of Control，缩写为IoC），意思是正常情况下类A需要一个类B的时候，我们需要自己去new类B，意味着我们必须知道类B的更多细节，比如构造函数，随着项目的复杂性增大，这种依赖是毁灭性的。控制反转的意思就是，将类A主动获取类B的过程颠倒过来变成被动，类A只需要声明它需要什么，然后由容器提供。\r\n\r\nfile\r\n\r\n这样做的好处是，类A不依赖于类B的实现，这样在一定程度上解决了耦合问题。\r\n\r\n在Laravel的服务容器中，为了实现控制反转，可以有以下两种：\r\n\r\n依赖注入（Dependency Injection）。\r\n绑定。\r\n依赖注入\r\n依赖注入是一种类型提示，举官网的例子：\r\n\r\nclass UserController extends Controller\r\n{\r\n    /**\r\n     * The user repository implementation.\r\n     *\r\n     * @var UserRepository\r\n     */\r\n    protected $users;\r\n\r\n    /**\r\n     * Create a new controller instance.\r\n     *\r\n     * @param  UserRepository  $users\r\n     * @return void\r\n     */\r\n    public function __construct(UserRepository $users)\r\n    {\r\n        $this->users = $users;\r\n    }\r\n\r\n    /**\r\n     * Show the profile for the given user.\r\n     *\r\n     * @param  int  $id\r\n     * @return Response\r\n     */\r\n    public function show($id)\r\n    {\r\n        $user = $this->users->find($id);\r\n\r\n        return view(\'user.profile\', [\'user\' => $user]);\r\n    }\r\n}\r\n这里UserController需要一个UserRepository实例，我们只需在构造方法中声明我们需要的类型，容器在实例化UserController时会自动生成UserRepository的实例（或者实现类，因为UserRepository可以为接口），而不用主动去获取UserRepository的实例，这样也就避免了了解UserRepository的更多细节，也不用解决UserRepository所产生的依赖，我们所做的仅仅是声明我们所需要的类型，所有的依赖问题都交给容器去解决。（Xblog使用了Repository的是设计模式，大家可以参考）\r\n\r\n绑定\r\n绑定操作一般在ServiceProviders中的register方法中，最基本的绑定是容器的bind方法，它接受一个类的别名或者全名和一个闭包来获取实例：\r\n\r\n$this->app->bind(\'XblogConfig\', function ($app) {\r\n    return new MapRepository();\r\n});\r\n还有一个singleton方法，和bind写法没什么区别。你也可以绑定一个已经存在的对象到容器中，上文中提到的request实例就是通过这种方法绑定到容器的：$this->app->instance(\'request\', $request);。绑定之后，我们可以通过一下几种方式来获取绑定实例：\r\n\r\n1.  app(\'XblogConfig\');\r\n\r\n2.  app()->make(\'XblogConfig\');\r\n\r\n3.  app()[\'XblogConfig\'];\r\n\r\n4.  resolve(\'XblogConfig\');\r\n以上四种方法均会返回获得MapRepository的实例，唯一的区别是，在一次请求的生命周期中，bind方法的闭包会在每一次调用以上四种方法时执行，singleton方法的闭包只会执行一次。在使用中，如果每一个类要获的不同的实例，或者需要“个性化”的实例时，这时我们需要用bind方法以免这次的使用对下次的使用造成影响；如果实例化一个类比较耗时或者类的方法不依赖该生成的上下文，那么我们可以使用singleton方法绑定。singleton方法绑定的好处就是，如果在一次请求中我们多次使用某个类，那么只生成该类的一个实例将节省时间和空间。\r\n\r\n你也可以绑定接口与实现，例如：\r\n\r\n$app->singleton(\r\n    Illuminate\\Contracts\\Http\\Kernel::class,\r\n    App\\Http\\Kernel::class\r\n);\r\n上文讲述的Laravel的生命周期的第二步，Laravel默认（在bootstrap\\app.php文件中）绑定了Illuminate\\Contracts\\Http\\Kernel，Illuminate\\Contracts\\Console\\Kernel，Illuminate\\Contracts\\Debug\\ExceptionHandler接口的实现类，这些是实现类框架的默认自带的。但是你仍然可以自己去实现。\r\n\r\n还有一种上下文绑定，就是相同的接口，在不同的类中可以自动获取不同的实现，例如：\r\n\r\n$this->app->when(PhotoController::class)\r\n          ->needs(Filesystem::class)\r\n          ->give(function () {\r\n              return Storage::disk(\'local\');\r\n          });\r\n\r\n$this->app->when(VideoController::class)\r\n          ->needs(Filesystem::class)\r\n          ->give(function () {\r\n              return Storage::disk(\'s3\');\r\n          });\r\n上述表明，同样的接口Filesystem，使用依赖注入时，在PhotoController中获取的是local存储而在VideoController中获取的是s3存储。\r\n\r\nContracts & Facades（合同&假象）\r\n\r\nLaravel 还有一个强大之处是，比如你只需在配置文件中指明你需要的缓存驱动（redis，memcached，file......），Laravel 就自动办你切换到这种驱动，而不需要你针对某种驱动更改逻辑和代码。Why? 很简单，Laravel定义了一系列Contracts（翻译：合同），本质上是一系列PHP接口，一系列的标准，用来解耦具体需求对实现的依赖关系。其实真正强大的公司是制定标准的公司，程序也是如此，好的标准（接口）尤为重要。当程序变得越来大，这种通过合同或者接口来解耦所带来的可扩展性和可维护性是无可比拟的。\r\n\r\nfile\r\n\r\n上图不使用Contracts的情况下，对于一种逻辑，我们只能得到一种结果（方块），如果变更需求，意味着我们必须重构代码和逻辑。但是在使用Contracts的情况下，我们只需要按照接口写好逻辑，然后提供不同的实现，就可以在不改动代码逻辑的情况下获得更加多态的结果。\r\n\r\n这么说有点抽象，举一个真实的例子。在完成Xblog的初期，我使用了缓存，所以导致Repository中充满了和cache相关的方法：remember，flush，forget等等。后来国外网友反映，简单的博客并不一定需要缓存。所以我决定把它变成可选，但因为代码中充满和cache相关的方法，实现起来并不是很容易。于是想起Laravel的重要概念Contracts。于是，我把与缓存有关的方法抽象出来形成一个Contracts:XblogCache，实际操作只与Contracts有关，这样问题就得到了解决，而几乎没有改变原有的逻辑。XblogCache的代码如下（源码点击这里）:\r\n\r\nnamespace App\\Contracts;\r\nuse Closure;\r\ninterface XblogCache\r\n{\r\n    public function setTag($tag);\r\n    public function setTime($time_in_minute);\r\n    public function remember($key, Closure $entity, $tag = null);\r\n    public function forget($key, $tag = null);\r\n    public function clearCache($tag = null);\r\n    public function clearAllCache();\r\n}\r\n然后，我又完成了两个实现类：Cacheable和NoCache：\r\n\r\n实现具体缓存。\r\n\r\nclass Cacheable implements XblogCache\r\n{\r\npublic $tag;\r\npublic $cacheTime;\r\npublic function setTag($tag)\r\n{\r\n    $this->tag = $tag;\r\n}\r\npublic function remember($key, Closure $entity, $tag = null)\r\n{\r\n    return cache()->tags($tag == null ? $this->tag : $tag)->remember($key, $this->cacheTime, $entity);\r\n}\r\npublic function forget($key, $tag = null)\r\n{\r\n    cache()->tags($tag == null ? $this->tag : $tag)->forget($key);\r\n}\r\npublic function clearCache($tag = null)\r\n{\r\n    cache()->tags($tag == null ? $this->tag : $tag)->flush();\r\n}\r\npublic function clearAllCache()\r\n{\r\n    cache()->flush();\r\n}\r\npublic function setTime($time_in_minute)\r\n{\r\n    $this->cacheTime = $time_in_minute;\r\n}\r\n}\r\n不缓存。\r\nclass NoCache implements XblogCache\r\n{\r\npublic function setTag($tag)\r\n{\r\n    // Do Nothing\r\n}\r\npublic function setTime($time_in_minute)\r\n{\r\n    // Do Nothing\r\n}\r\npublic function remember($key, Closure $entity, $tag = null)\r\n{\r\n    /**\r\n     * directly return\r\n     */\r\n    return $entity();\r\n}\r\npublic function forget($key, $tag = null)\r\n{\r\n    // Do Nothing\r\n}\r\npublic function clearCache($tag = null)\r\n{\r\n    // Do Nothing\r\n}\r\npublic function clearAllCache()\r\n{\r\n    // Do Nothing\r\n}\r\n}\r\n然后再利用容器的绑定，根据不同的配置，返回不同的实现（源码）：\r\n\r\npublic function register()\r\n{\r\n        $this->app->bind(\'XblogCache\', function ($app) {\r\n            if (config(\'cache.enable\') == \'true\') {\r\n                return new Cacheable();\r\n            } else {\r\n                return new NoCache();\r\n            }\r\n        });\r\n}\r\n这样，就实现了缓存的切换而不需要更改你的具体逻辑代码。当然依靠接口而不依靠具体实现的好处不仅仅这些。实际上，Laravel所有的核心服务都是实现了某个Contracts接口（都在Illuminate\\Contracts\\文件夹下面），而不是依赖具体的实现，所以完全可以在不改动框架的前提下，使用自己的代码改变Laravel框架核心服务的实现方式。\r\n\r\n说一说Facades。在我们学习了容器的概念后，Facades就变得十分简单了。在我们把类的实例绑定到容器的时候相当于给类起了个别名，然后覆盖Facade的静态方法getFacadeAccessor并返回你的别名，然后你就可以使用你自己的Facade的静态方法来调用你绑定类的动态方法了。其实Facade类利用了__callStatic() 这个魔术方法来延迟调用容器中的对象的方法，这里不过多讲解，你只需要知道Facade实现了将对它调用的静态方法映射到绑定类的动态方法上，这样你就可以使用简单类名调用而不需要记住长长的类名。这也是Facades的中文翻译为假象的原因。\r\n\r\n总结\r\n\r\nLaravel强大之处不仅仅在于它给你提供了一系列脚手架，比如超级好用的ORM，基于Carbon的时间处理，以及文件存储等等功能。但是Laravel的核心非常非常简单：利用容器和抽象解耦，实现高扩展性。容器和抽象是所有大型框架必须解决的问题，像Java的Spring，Android的Dagger2等等都是围绕这几个问题的。所以本质上讲，Laravel之所以强大出名，是因为它的设计，思想，可扩展性。而Laravel的好用功能只是官方基于这些核心提供的脚手架，你同样也可以很轻松的添加自己的脚手架。\r\n\r\n所以不要觉得Laravel强大是因为他提供的很多功能，而是它的设计模式和思想。\r\n\r\n理解Laravel生命周期和请求的生命周期概念。\r\n所有的静态变量和单例，在下一个请求到来时都会重新初始化。\r\n将耗时的类或者频繁使用的类用singleton绑定。\r\n将变化选项的抽象为Contracts，依赖接口不依赖具体实现。\r\n善于利用Laravel提供的容器。\r\n参考：\r\n\r\n深入理解php底层：php生命周期\r\nLaravel 官方文档\r\nlaravel/framework\r\n-- END', '40', '1500278451', '1500278451', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('54', 'testqiantai2', '', 'Laravel 中一些常用的小技巧，额，说不定你就用上了。。。\r\n\r\n1.侧栏\r\n网站一般都有侧栏，用来显示分类，标签，热门文章，热门评论啥的，但是这些侧栏都是相对独立的模块，如果在每一个引入侧栏的视图中都单独导入与视图有关的数据的话，未免太冗余了。。。所以最佳的做法是：新建一个widgets视图文件夹，再利用Laravel 的ViewComposers单独为侧栏绑定数据，这样侧栏就可以随便引入而不用关心数据是否绑定啦~~~\r\n\r\n举个栗子？拿最常用的分类侧栏来说，在resources/views/widgets下新建你的分类侧栏视图文件categories.blade.php：\r\n\r\n<div class=\"widget widget-default\">\r\n    <div class=\"widget-header\"><h6><i class=\"fa fa-folder fa-fw\"></i>分类</h6></div>\r\n    <ul class=\"widget-body list-group\">\r\n        @forelse($categories as $category)\r\n            @if(str_contains(urldecode(request()->getPathInfo()),\'category/\'.$category->name))\r\n                <li href=\"{{ route(\'category.show\',$category->name) }}\"\r\n                    class=\"list-group-item active\">\r\n                    {{ $category->name }}\r\n                    <span class=\"badge\">{{ $category->posts_count }}</span>\r\n                </li>\r\n            @else\r\n                <a href=\"{{ route(\'category.show\',$category->name) }}\"\r\n                   class=\"list-group-item\">\r\n                    {{ $category->name }}\r\n                    <span class=\"badge\">{{ $category->posts_count }}</span>\r\n                </a>\r\n            @endif\r\n        @empty\r\n            <p class=\"meta-item center-block\">No categories.</p>\r\n        @endforelse\r\n    </ul>\r\n</div>\r\n新建app/Http/ViewComposers文件夹，然后创建CategoriesComposer.php：\r\n\r\n<?php\r\nnamespace App\\Http\\ViewComposers;\r\nuse App\\Http\\Repositories\\CategoryRepository;\r\nuse Illuminate\\View\\View;\r\nclass CategoriesComposer\r\n{\r\n    public function __construct(CategoryRepository $categoryRepository)\r\n    {\r\n        $this->categoryRepository = $categoryRepository;\r\n    }\r\n\r\n    public function compose(View $view)\r\n    {\r\n        $categories = $this->categoryRepository->getAll()->reject(function ($category) {\r\n            return $category->posts_count == 0;\r\n        });\r\n        $view->with(\'categories\', $categories);\r\n    }\r\n}\r\n再在app/Providers文件夹下新建ComposerServiceProvider.php文件：\r\n\r\n<?php\r\nnamespace App\\Providers;\r\nuse Illuminate\\Support\\ServiceProvider;\r\nuse Illuminate\\Support\\Facades\\View;\r\nclass ComposerServiceProvider extends ServiceProvider\r\n{\r\n\r\n    public function boot()\r\n    {\r\n        View::composer(\'widget.categories\', \'App\\Http\\ViewComposers\\CategoriesComposer\');\r\n    }\r\n\r\n    public function register(){}\r\n}\r\n最后别忘了在config/app.php中的providers数组中添加App\\Providers\\ComposerServiceProvider::class啊。好了，现在你可以随时随地@include(\'widget.categories\')了。对了，要善于在ViewComposer中利用Collection的强大方法进行数据处理幺~~\r\n\r\n2.善用路由别名\r\nLaravel 最让人喜欢的地方之一是可以给路由起一个别名，比如：\r\n\r\nRoute::get(\'user/profile\', \'UserController@showProfile\')->name(\'user.profile\');\r\n// 等价于：\r\nRoute::get(\'user/profile\', [\'uses\' => \'UserController@showProfile\' , \'as\' => \'user.profile\']);;\r\n然后，就可以在试图中就可以使用route()方法引用了：\r\n\r\n// 例如：\r\n<a href=\"{{ route(\'user.profile\') }}\">lufficc</a>\r\n因为一个普通的项目路由至少也得有几十个，如果使用url()方法的话，你不但要记住具体的路由，更麻烦的是如果你将来想要改变某个路由（比如把\'user/profile\'改为\'u/profile\'，或者加个前缀啥的），必须改变所有相关的视图文件，这。。。这。。。不敢相信，而使用命名路由的话，只要命名不变，毫不受影响。\r\n\r\n所以视图文件中尽量避免使用url()方法，为每一个路由命名，一个默认的命名规则为：资源名称.<属性>或者<动作>，如post.show，image.upload。\r\n\r\n3.全局动态设置\r\n仅仅是.env的配置还无法满足我们的需求，有时我们需要可以在后台动态的进行一些设置，比如网站的标题，网站的背景图片或者是否允许评论等等。那么实现这个的最佳实践是什么？\r\n\r\n熟悉wordpress的同学知道，wordpress可以进行很多自定义，因为wordpress有一张键值对数据库表，它就是靠这个实现个性化的。因此我们也可以参考这种思路，增加一个键值对表，以Xblog为例子，新建一个maps表：\r\n\r\nSchema::create(\'maps\', function (Blueprint $table) {\r\n       $table->increments(\'id\');\r\n       $table->string(\'key\')->unique();\r\n       $table->string(\'tag\')->index();\r\n       $table->text(\'value\')->nullable(true);\r\n});\r\nmaps表的作用就是实现键值对key-value存储，tag的是为了可以有一个分类。然后后台进行存储的话，不要写死，这样就可以随时在变单中添加设置而无需更改代码：\r\n\r\n$inputs = $request->except(\'_token\');\r\nforeach ($inputs as $key => $value) {\r\n            $map = Map::firstOrNew([\r\n                \'key\' => $key,\r\n            ]);\r\n            $map->tag = \'settings\';\r\n            $map->value = $value;\r\n            $map->save();\r\n}\r\n注意firstOrNew的用法：如果不存在这个选项我们就新增一个并保存，否则就更新它。然后我们就可以在视图中随便增加任意多个表单了（或者也可以用js动态生成表单）。有了数据，怎么在视图中利用呢？利用ViewComposer，新建一个SettingsComposer.php，然后将查询的数据以数组的形式传递给试图：\r\n\r\n//在SettingsComposer.php的compose方法中绑定数据\r\npublic function compose(View $view)\r\n{\r\n    $settings = Map::where(\'tag\', \'settings\')->get();\r\n    $arr = [];\r\n    foreach ($settings as $setting) {\r\n      $arr[$setting->key] = $setting->value;\r\n    }\r\n   $view->with($arr);\r\n}\r\n然后就可以在视图中随便引用了，如你表单新增加了一个description\r\n\r\n<input type=\"text\" name=\"description\" value=\"{{ $description or \'\'}}\">\r\n然后就可以在任何视图引用了:{{ $description or \'\'}}。另外还可以绑定一个单例Facades到容器，这样就可以在代码中随时获取配置信息啦~~~\r\n比如：\r\n\r\n//1.注册\r\npublic function register()\r\n{\r\n    $this->app->singleton(\'XblogConfig\', function ($app) {\r\n       return new MapRepository();\r\n   });\r\n}\r\n//2.注册Facade\r\nclass XblogConfig extends Facade\r\n{\r\n    public static function getFacadeAccessor()\r\n    {\r\n        return \'XblogConfig\';\r\n    }\r\n}\r\n//3.添加到aliases数组\r\n\r\n\'aliases\' => [\r\n\r\n        *****************  省略  *************************\r\n        \'XblogConfig\' => App\\Facades\\XblogConfig::class,\r\n    ],\r\n\r\n//4.愉快的使用，可爽\r\n$page_size = XblogConfig::getValue(\'page_size\', 7);\r\n4.数据库查询\r\n怎么统计一篇文章有多少评论？最快的方法是：\r\n\r\n$post = Post::where(\'id\',1)->withCount(\'comments\')->first();\r\n这样$post变量就有一个属性comments_count了：\r\n\r\n$post->comments_count;\r\n如果想获取点赞数大于的100的评论个数怎么办？这样：\r\n\r\n$post = Post::where(\'id\',1)->withCount(\'comments\',function($query){\r\n       $query->where(\'like\', \'>\', 100);\r\n   })->first();\r\n简单吧~~\r\n\r\n5.多态关联\r\n文章可以有评论，页面可以有评论，评论也可以有评论，但是总不能建三张评论表吧？如果自己写条件判断也太麻烦了吧。。。Laravel的多态关联上场了！！\r\n\r\n//1.第一步在Comment模型中说明我是可以多态的\r\npublic function commentable()\r\n{\r\n    return $this->morphTo();\r\n}\r\n\r\n//2.在想要评论的模型中增加comments方法，\r\npublic function comments()\r\n{\r\n    return $this->morphMany(Comment::class, \'commentable\');\r\n}\r\n\r\n//3.使用，就像普通的一对多关系一样：\r\n$model->comments;\r\n原理很简单，comments表中增加两个列就行：\r\n\r\nSchema::create(\'comments\', function (Blueprint $table) {\r\n     ***************省略*******************\r\n     $table->morphs(\'commentable\');\r\n     //等价于\r\n     $table->integer(\'commentable_id\')->index();\r\n     $table->string(\'commentable_type\')->index();\r\n    ****************省略******************\r\n});\r\n然后 laravel 会自动维持这些关系。注意，保存的评论的时候是有小技巧的，你的表单中至少要传两个参数：commentable_id和commentable_type：\r\n\r\n$comment = new Comment();\r\n\r\n$commentable_id = $request->get(\'commentable_id\');\r\n//commentable_type取值例如：App\\Post，App\\Page等等\r\n$commentable = app($request->get(\'commentable_type\'))->where(\'id\', $commentable_id)->firstOrFail();\r\n\r\n****************省略******************\r\n\r\n$commentable->comments()->save($comment);\r\n保存评论的时候并不知道是谁的评论，而是使用容器根据commentable_type生成一个模型实例，这样也就和具体的模型解耦了，你可以让任何东西可以评论，而不需要修改代码。\r\n\r\n6.缓存优化相关\r\n如果你想要在.env文件中添加自己的配置，记住一定要在config文件夹下某个配置文件的数组中添加对应的。记住，除了config文件夹下的配置文件，永远不要在其它地方使用env函数，因为部署到线上时，配置文件缓存（php artisan config:cache）后，env函数无法获得正确的值。\r\n\r\n另外注意的是，路由文件中尽量不使用闭包函数，统一使用控制器，因为缓存路由的时候php artisan route:cache，无法缓存闭包函数。\r\n\r\n7.Redis\r\n如果你缓存使用Redis，session也使用了Redis，队列已使用了Redis，这样没问题，速度很快，但是！！当你运行php artisan cache:clear清除缓存时，会把你的登录信息清除，也会把队列清除。。。这就不优雅了。解决办法很简单，为它们分配不同的连接即可。\r\n首先在config\\database.php中增加连接，注意database序号：\r\n\r\n\'redis\' => [\r\n\r\n        \'cluster\' => false,\r\n\r\n        \'default\' => [\r\n            \'host\' => env(\'REDIS_HOST\', \'localhost\'),\r\n            \'password\' => env(\'REDIS_PASSWORD\', null),\r\n            \'port\' => env(\'REDIS_PORT\', 6379),\r\n            \'database\' => 0,\r\n        ],\r\n        \'session\' => [\r\n            \'host\' => env(\'REDIS_HOST\', \'localhost\'),\r\n            \'password\' => env(\'REDIS_PASSWORD\', null),\r\n            \'port\' => env(\'REDIS_PORT\', 6379),\r\n            \'database\' => 1,\r\n        ],\r\n        \'queue\' => [\r\n            \'host\' => env(\'REDIS_HOST\', \'localhost\'),\r\n            \'password\' => env(\'REDIS_PASSWORD\', null),\r\n            \'port\' => env(\'REDIS_PORT\', 6379),\r\n            \'database\' => 2,\r\n        ],\r\n\r\n    ],\r\n然后分别为session和queue更换连接：\r\n\r\n//queue.php中的connections数组中：\r\n\'redis\' => [\r\n            \'driver\' => \'redis\',\r\n            \'connection\' => \'queue\',\r\n            \'queue\' => \'default\',\r\n            \'retry_after\' => 90,\r\n        ],\r\n\r\n//session.php中的connection选项：\r\n\'connection\' => \'session\',\r\n这样他们就互不相干了~~\r\n\r\n以上经验来自Xblog，示例均可以在Xblog找到\r\n\r\n-- END', '42', '1500278581', '1500278581', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('55', 'ttttt', '', 'dada`sss`ffff`sss`\r\n```\r\nddadad\r\n```\r\n1. 51\r\ndadadad\r\n2\r\n----------\r\n. .515161\r\n![\\3fc8df313a6edcfc93b0429fcb127b1a.jpg][0.5301731650858998]\r\n\r\n  [0.5301731650858998]: http://www.blog.com/uploads/2017-07-17/5002ebeb3274aaf15f382fa4c2cee581.jpg', '40', '1500281362', '1500367855', '1', '1', '0');
INSERT INTO `blog_article` VALUES ('99', '基于 Laravel-Admin 在十分钟内搭建起功能齐全的后台模板', '', '##test##\r\n\r\n----------\r\n* 这个事一个测试\r\n\r\n为 Laravel 提供后台模板的项目越来越多，学院君已陆续为大家介绍过Laravel Angular Admin、LaraAdmin、Voyager等，网友也贡献了很多后台模板，这对 Laravel 生态来说自然是好事，今天学院君还要给大家介绍一个后台模板扩展包，其官方文档号称可以帮助大家在十分钟内构建器功能完备的 Laravel 应用后台。接下来，让我们来一窥究竟吧。\r\n\r\n* 这是宁外一个侧四\r\n\r\nlaravel-admin 是一个用于为Laravel提供后台界面的构建器，仅仅通过数行代码，就可以帮助我们构建CRUD后台。\r\n\r\n* 安装\r\n\r\n`注：安装前确保数据库连接配置正确。\r\n\r\n`\r\n以下是不同版本 Laravel 下 Composer 安装命令：\r\n\r\n\r\n```\r\nLaravel 5.2\r\ncomposer require encore/laravel-admin \"dev-master\"\r\n\r\nLaravel 5.3\r\ncomposer require encore/laravel-admin \"1.3.x-dev\"\r\n\r\nLaravel 5.1\r\ncomposer require encore/laravel-admin \"1.1.x-dev\"\r\n```', '40', '1500368826', '1500447522', '1', '1', '0');
INSERT INTO `blog_article` VALUES ('100', '基于 Laravel-Admin 在十分钟内搭建起功能齐全的后台模板', '', '##test##\r\n\r\n----------\r\n* 这个事一个测试\r\n\r\n为 Laravel 提供后台模板的项目越来越多，学院君已陆续为大家介绍过Laravel Angular Admin、LaraAdmin、Voyager等，网友也贡献了很多后台模板，这对 Laravel 生态来说自然是好事，今天学院君还要给大家介绍一个后台模板扩展包，其官方文档号称可以帮助大家在十分钟内构建器功能完备的 Laravel 应用后台。接下来，让我们来一窥究竟吧。\r\n\r\n* 这是宁外一个侧四\r\n\r\nlaravel-admin 是一个用于为Laravel提供后台界面的构建器，仅仅通过数行代码，就可以帮助我们构建CRUD后台。\r\n\r\n* 安装\r\n\r\n`注：安装前确保数据库连接配置正确。\r\n\r\n`\r\n以下是不同版本 Laravel 下 Composer 安装命令：\r\n\r\n\r\n```\r\nccccLaravel 5.2\r\ncomposer require encore/laravel-admin \"dev-master\"\r\n\r\nLaravel 5.3\r\ncomposer require encore/laravel-admin \"1.3.x-dev\"\r\n\r\nLaravel 5.1\r\ncomposer require encore/laravel-admin \"1.1.x-dev\"\r\n`\r\n```', '40', '1500368876', '1500447530', '1', '1', '0');
INSERT INTO `blog_article` VALUES ('101', '基于 Laravel-Admin 在十分钟内搭建起功能齐全的后台模板', '', '----------\r\n* 这个事一个测试\r\n\r\n为 Laravel 提供后台模板的项目越来越多，学院君已陆续为大家介绍过Laravel Angular Admin、LaraAdmin、Voyager等，网友也贡献了很多后台模板，这对 Laravel 生态来说自然是好事，今天学院君还要给大家介绍一个后台模板扩展包，其官方文档号称可以帮助大家在十分钟内构建器功能完备的 Laravel 应用后台。接下来，让我们来一窥究竟吧。\r\n\r\n* 这是宁外一个侧四\r\n\r\nlaravel-admin 是一个用于为Laravel提供后台界面的构建器，仅仅通过数行代码，就可以帮助我们构建CRUD后台。\r\n\r\n* 安装\r\n\r\n`注：安装前确保数据库连接配置正确。\r\n\r\n`\r\n以下是不同版本 Laravel 下 Composer 安装命令：\r\n\r\n\r\n```\r\nccccLaravel 5.2\r\ncomposer require encore/laravel-admin \"dev-master\"\r\n\r\nLaravel 5.3\r\ncomposer require encore/laravel-admin \"1.3.x-dev\"\r\n\r\nLaravel 5.1\r\ncomposer require encore/laravel-admin \"1.1.x-dev\"\r\n`\r\n```', '40', '1500368880', '1500447540', '1', '1', '0');
INSERT INTO `blog_article` VALUES ('102', '基于 Laravel-Admin 在十分钟内搭建起功能齐全的后台模板', '', '* 这个事一个测试\r\n\r\n为 Laravel 提供后台模板的项目越来越多，学院君已陆续为大家介绍过Laravel Angular Admin、LaraAdmin、Voyager等，网友也贡献了很多后台模板，这对 Laravel 生态来说自然是好事，今天学院君还要给大家介绍一个后台模板扩展包，其官方文档号称可以帮助大家在十分钟内构建器功能完备的 Laravel 应用后台。接下来，让我们来一窥究竟吧。\r\n\r\n* 这是宁外一个侧四\r\n\r\nlaravel-admin 是一个用于为Laravel提供后台界面的构建器，仅仅通过数行代码，就可以帮助我们构建CRUD后台。\r\n\r\n* 安装\r\n\r\n`注：安装前确保数据库连接配置正确。\r\n\r\n`\r\n以下是不同版本 Laravel 下 Composer 安装命令：\r\n\r\n\r\n```\r\nccccLaravel 5.2\r\ncomposer require encore/laravel-admin \"dev-master\"\r\n\r\nLaravel 5.3\r\ncomposer require encore/laravel-admin \"1.3.x-dev\"\r\n\r\nLaravel 5.1\r\ncomposer require encore/laravel-admin \"1.1.x-dev\"\r\n`\r\n```', '40', '1500368884', '1500447543', '1', '1', '0');
INSERT INTO `blog_article` VALUES ('103', 'test', '', 'Laravel 5.2\r\ncomposer require encore/laravel-admin \"dev-master\"\r\n\r\nLaravel 5.3\r\ncomposer require encore/laravel-admin \"1.3.x-dev\"\r\n\r\nLaravel 5.1\r\ncomposer require encore/laravel-admin \"1.1.x-dev\"\r\n`', '39', '1500368930', '1500368930', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('104', 'test', '', 'Laravel 5.2\r\ncomposer require encore/laravel-admin \"dev-master\"\r\n\r\nLaravel 5.3\r\ncomposer require encore/laravel-admin \"1.3.x-dev\"\r\n\r\nLaravel 5.1\r\ncomposer require encore/laravel-admin \"1.1.x-dev\"\r\n`', '39', '1500368964', '1500368964', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('105', 'dddddddd', '', 'ffff\r\n function push_tag_id(e){\r\n            console.log(e);\r\n        } function push_tag_id(e){\r\n            console.log(e);\r\n        }\r\n        Laravel 5.2\r\ncomposer require encore/laravel-admin \"dev-master\"\r\n\r\nLaravel 5.3\r\ncomposer require encore/laravel-admin \"1.3.x-dev\"\r\n\r\nLaravel 5.1\r\ncomposer require encore/laravel-admin \"1.1.x-dev\"\r\n```\r\nLaravel 5.2\r\ncomposer require encore/laravel-admin \"dev-master\"\r\n\r\nLaravel 5.3\r\ncomposer require encore/laravel-admin \"1.3.x-dev\"\r\n\r\nLaravel 5.1\r\ncomposer require encore/laravel-admin \"1.1.x-dev\"\r\n```', '39', '1500368997', '1500532810', '1', '1', '0');
INSERT INTO `blog_article` VALUES ('106', 'dddddddd', '', 'ffff\r\n function push_tag_id(e){\r\n            console.log(e);\r\n        } function push_tag_id(e){\r\n            console.log(e);\r\n        }\r\n        Laravel 5.2\r\ncomposer require encore/laravel-admin \"dev-master\"\r\n\r\nLaravel 5.3\r\ncomposer require encore/laravel-admin \"1.3.x-dev\"\r\n\r\nLaravel 5.1\r\ncomposer require encore/laravel-admin \"1.1.x-dev\"\r\n```\r\nLaravel 5.2\r\ncomposer require encore/laravel-admin \"dev-master\"\r\n\r\nLaravel 5.3\r\ncomposer require encore/laravel-admin \"1.3.x-dev\"\r\n\r\nLaravel 5.1\r\ncomposer require encore/laravel-admin \"1.1.x-dev\"\r\n```', '39', '1500369031', '1500369031', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('107', 'ddfaxc', '', '```\r\nhttp://www.blog.com/admin/article/add\r\n```\r\n\r\n\r\n\r\n\r\ndada\r\n\r\nadad', '40', '1500369715', '1500369715', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('108', 'eeeee', '', '```http\r\n\r\nserver\r\n    {\r\n        listen 8989;\r\n        #listen [::]:80 default_server ipv6only=on;\r\n        server_name _;\r\n        index index.html index.htm index.php;\r\n        root  /home/wwwroot/demo1/public;\r\n        #error_page   404   /404.html;\r\n        # Deny access to PHP files in specific directory\r\n        #location ~ /(wp-content|uploads|wp-includes|images)/.*\\.php$ { deny all; }\r\n        include enable-php.conf;\r\n        location / {\r\n            try_files $uri $uri/ /index.php?$query_string;\r\n        }\r\n        location /nginx_status\r\n        {\r\n            stub_status on;\r\n            access_log   off;\r\n        }\r\n        location ~ .*\\.(gif|jpg|jpeg|png|bmp|swf)$\r\n        {\r\n            expires      30d;\r\n        }\r\n        location ~ .*\\.(js|css)?$\r\n        {\r\n            expires      12h;\r\n        }\r\n        location ~ /.well-known {\r\n            allow all;\r\n        }\r\n        location ~ /\\.\r\n        {\r\n            deny all;\r\n        }\r\n        access_log  /home/wwwlogs/access.log;\r\n    }\r\n    \r\n```', '41', '1500432108', '1500432108', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('109', '自定义模板，为博客安装代码高亮', '', '本篇文章主要介绍怎样安装代码高亮\r\n* 一安装\r\n输入以下代码\r\n\r\n```java\r\n@RequestMapping(\"/acc\")\r\npublic void acc1(HttpServletRequest request,HttpServletResponse response) throws Exception{\r\n    \r\n    SimpleDateFormat sdf = new SimpleDateFormat(\"yyyyMMddHHmmss\");\r\n    System.out.println(sdf.format(new Date())+\"-->post begin.......\");\r\n     BufferedReader reader = new BufferedReader(\r\n             new InputStreamReader(request.getInputStream(),\"UTF-8\"));\r\n     String line=null;\r\n     StringBuilder buffer = new StringBuilder();\r\n     while((line = reader.readLine())!=null){\r\n             buffer.append(line);\r\n           }\r\n     System.out.println(\"recive:   \"+buffer.toString());\r\n     String key = buffer.toString().substring(0, 16);\r\n     String content =  buffer.toString().substring(16);\r\n     System.out.println(\"before 16 string:    \"+key);\r\n     System.out.println(\"content :    \"+content);\r\n     System.out.println(\"decrypt ：       \"+RC4.HloveyRC4(content, key));\r\n     \r\n    System.out.println(sdf.format(new Date())+\"-->post end.......\");\r\n}\r\n```\r\n\r\n* 然后呢再输入这个代码\r\n\r\n```java\r\n// 测试框架\r\npublic abstract class Test<C> {\r\n    String name;\r\n    // 测试名称\r\n    public Test(String name){\r\n        this.name = name;\r\n    }\r\n    // 测试容器，测试参数\r\n    public abstract int test(C container, TestParam tp);\r\n}\r\n// 测试参数类\r\npublic class TestParam {\r\n    public final int size;\r\n    public final int loops;\r\n    public TestParam(int size, int loops) {\r\n        this.size = size;\r\n        this.loops = loops;\r\n    }\r\n    public static TestParam[] array(int... values){\r\n        int size = values.length/2;\r\n        TestParam[] result = new TestParam[size];\r\n        int n = 0;\r\n        for (int i = 0; i < size; i++)\r\n            result[i] = new TestParam(values[n++], values[n++]);\r\n        return result;\r\n    }\r\n    public static TestParam[] array(String[] values){\r\n        int[] vals = new int[values.length];\r\n        for (int i = 0; i < vals.length; i++)\r\n            vals[i] = Integer.decode(values[i]);\r\n        return array(vals);\r\n    }\r\n}\r\n// 测试类\r\npublic class Tester<C> {\r\n    public static int fieldWidth = 8; // 格式化的标准宽度\r\n    public static TestParam[] defaultParams = TestParam.array(\r\n            10, 5000,\r\n            100, 5000,\r\n            1000, 5000,\r\n            10000, 500);\r\n    protected C initialize(int size){ return container; }\r\n    protected C container;\r\n    private String headline = \"\";\r\n    private List<Test<C>> tests;\r\n    private static String stringField(){\r\n        return \"%\" + fieldWidth + \"s\";\r\n    }\r\n    private static String numberField(){\r\n        return \"%\" + fieldWidth + \"d\";\r\n    }\r\n    private static int sizeWidth = 5;\r\n    private static String sizeField = \"%\" + sizeWidth + \"s\";\r\n    private TestParam[] paramList = defaultParams;\r\n    public Tester(C container, List<Test<C>> tests){\r\n        this.container = container;\r\n        this.tests = tests;\r\n        if(container != null)\r\n            headline = container.getClass().getSimpleName();\r\n    }\r\n    public Tester(C container, List<Test<C>> tests, TestParam[] paramList){\r\n        this(container, tests);\r\n        this.paramList = paramList;\r\n    }\r\n    public void setHeadline(String newHeadline){\r\n        headline = newHeadline;\r\n    }\r\n    public static <C> void run(C cntnr, List<Test<C>> tests){\r\n        new Tester<C>(cntnr, tests).timedTest();\r\n    }\r\n    public static <C> void run(C cntnr, List<Test<C>> tests, TestParam[] paramList){\r\n        new Tester<C>(cntnr, tests, paramList).timedTest();\r\n    }\r\n    // 为每个测试格式化和打印头部信息\r\n    private void displayHeader(){\r\n        int width = fieldWidth * tests.size() + sizeWidth;\r\n        int dashLength = width - headline.length() - 1;\r\n        StringBuilder head = new StringBuilder(width);\r\n        for (int i = 0; i < dashLength/2; i++)\r\n            head.append(\'-\');\r\n        head.append(\" \");\r\n        head.append(headline);\r\n        head.append(\" \");\r\n        for (int i = 0; i < dashLength/2; i++)\r\n            head.append(\'-\');\r\n        System.out.println(head);\r\n        System.out.format(sizeField, \"size\");\r\n        for(Test test : tests)\r\n            System.out.format(stringField(), test.name);\r\n        System.out.println();\r\n    }\r\n    // 单个操作时间计算\r\n    public void timedTest(){\r\n        displayHeader();\r\n        for(TestParam param : paramList){\r\n            System.out.format(sizeField, param.size);\r\n            for(Test<C> test : tests){\r\n                C kontainer = initialize(param.size);\r\n                long start = System.nanoTime();\r\n                int reps = test.test(kontainer, param);\r\n                long duration = System.nanoTime() - start;\r\n                long timePerRep = duration / reps;\r\n                System.out.format(numberField(), timePerRep);\r\n            }\r\n            System.out.println();\r\n        }\r\n    }\r\n}\r\n```', '40', '1500435117', '1500435296', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('110', 'nav', '', '#dddd\r\n##wwwww\r\n##ffff\r\n###ddafa\r\nIntroduction\r\n\r\nI actively maintain many PHP repositories, and have contributed to hundreds of other repositories. My most recent product launch was StyleCI, an open source, and free hosted service, and according to http://git.io/top, I am the 2nd most active GitHub user as of July 23rd 2015. You may want to download my CV.', '40', '1500452546', '1500532879', '1', '1', '0');
INSERT INTO `blog_article` VALUES ('111', 'navdd', '', '##技术动态\r\nES8 发布及主要特性总览\r\n\r\nES8 已经正式发布，这篇文章使用实例对 ES8 中确定的语言特性（比如 Object.values、Object.entries、String.padStart、String.padEnd）做了介绍，基础好的同学可以自己去阅读规范原文，此外，掘金翻译计划也把文章翻译成了中文。\r\n\r\n##文章教程\r\nJS 项目行军指南\r\n\r\n对于相当比例的工程师，尤其是刚入门的前端工程师来说，开始一个全新的项目就像是在未知领域摸索前行，如果方法不当，维护老项目更是噩梦，那么推进新项目是否有固定的套路可循呢？这篇文章是 Hive 的团队总结出来的 JS 项目行军指南，覆盖了 Git、依赖、测试、文件组织、代码规范等方面。\r\n\r\nAPI 安全检查清单\r\n\r\n《清单革命》中提出在医学领域使用检查清单是保障复杂手术成功简单却有效的方法，有人把这种方法论迁移到建筑领域，而软件工程领域同样使用，对于开始接触 JS 后端开发的同学，如何保障 API 服务的安全有很多方面需要考虑，如果想让自己成为思维缜密的工程师，这篇文章及其中提到的概念和技术，非常值得学习。\r\n\r\nawesome-guidelines：编码风格指南\r\n\r\n高质量的代码会体现在表层和结构两方面，表层主要指代码排列、变量命名等方面，结构主要体现在容错、扩展、调试等方面，表层的代码技巧相比结构方面更容易掌握，而通常来说表层很差的代码，结构也好不到哪里去，这篇汇集了很多门语言的编程规范、最佳实践。\r\n\r\n每个单元测试都必须回答的 5 个问题\r\n\r\n有个难以接受但是残酷的事实，大多数程序员都不知道怎么写测试，测试不仅能帮助你理清对需求的理解，还有利于设计的开展，更直接的是方便持续集成为以后的自动化回归打好基础。那么该怎么写测试？正确的思考都是从提问开始，每个单元测试都要回答 的问题包括：你在测什么？它是干啥的？输入是什么？输出是什么？如何重复测试？\r\n\r\n##开发工具\r\nRelease：快速生成仓库的 Changelog\r\n\r\nZeit 官方发布的命令行工具，运行之后能自动生成 GitHub Release，并且基于上次发布之后的提交生成本次 Release 的更新日志，如果不了解这种发版流程，建议去看看 React、React Native 的版本更新机制。\r\n\r\nChrome 60 DevTools 新功能预览\r\n\r\nChrome 无疑是配备了最好的开发者工具的浏览器，该视频通过实际操作讲解 Chrome 60 中新发布的 DevTools 功能，感兴趣的可以看看。\r\n\r\n###代码框架\r\nGifted Chat：React Native 会话式 UI 库\r\n\r\n在 AI 时代，人机交互的方式也有不少新的变化，具体到前端领域，会话式UI（Conversational UI）的崛起尤为显著，微信公号上的自动回复功能也可算作此类，Gifted Chat 是为 React Native 定制的会话式交互组件，在交互细节上做了不少的优化考量，也支持灵活的自定义，如果你最近想做个类似的 APP，应该可以用上。\r\n\r\nfranc：支持超过 800+ 语言的语种检测库\r\n\r\n如果你恰巧也需要在工作中处理多国语言，而需要知道数据库中存储的文本语种，franc 绝对能为你所用，支持超过 800+ 语种，支持计算某段文本属于某种语言的概率，长的文本输入能给你更精确的结果。\r\n\r\nMarkvis：在 Markdown 中输出图表\r\n\r\n不得不说 Markvis 为 Markdown 带来了更加丰富的表现力，支持条形图、饼图，并且这种需求是刚需，在 Markdown 越来越普及的今天。\r\n\r\n##找找灵感\r\nPractical Node.js：第2版\r\n\r\nPractical Node.js 开始修订第 2 版了，预计年底会完工，这个仓库是手稿原文，如果你看过的话是不是也可以参与进去呢？该书的第一版评价还比较不错。\r\n\r\nVimGameSnake：在 Vim 中玩贪吃蛇\r\n\r\n代码写累了想在 Vim 里面休闲下？请收下这款游戏吧，不要跟老板说是前端周刊介绍的，哈哈。当然，如果你想在 Vim 中尝试更多的游戏，可以移步：github.com/jmanoel7/vim-games。\r\n\r\nAI 术语中英文对照表\r\n\r\n如果你知道某个领域各种术语对应的英文单词，能看懂英文技术资料就会更容易，前端为什么要关注人工智能？科技发展的趋势是挡不住的，即使不做人工智能的开发，多学点单词也能避免不少拼音式变量名吧。\r\n\r\n##精彩问答\r\n如何对压缩混淆后的 JS 代码做逆向工程？\r\n\r\n很多前端同学在初入门的时候可能都用到了逆向工程的方法，区别就是逆向的难度大小的问题，通常 CSS、DOM 再明显不过了，你对压缩混淆过的 JS 代码做过逆向工程么？没有的话，读读这篇长文，看看 Alex Kras 是如何做到的。\r\n\r\n为什么 Reddit 选择了 TypeScript？\r\n\r\nReddit 的前端团队在做重构的时候重新选择了 TypeScript 作为基本的开发语言，他们调研了哪些方案？选择 TypeScript 的理由是什么？如果你时间有限就看最后的结论吧。\r\n\r\n认真的 JS 开发者必须知道的 10 件事？\r\n\r\n由一个想提高自己的前端工程师发布在 Redit 上的问题，高票答案总结的非常不错，现在的前端工程师跟五年前的前端工程师已经大不相同，如果你想在这个领域立足并成为大牛，这个答案可以作为基础技能检查清单。\r\n\r\nOne More Thing\r\n本文作者王仕军，商业转载请联系作者获得授权，非商业转载请注明出处。如果你觉得本文对你有帮助，请点赞！如果对文中的内容有任何疑问，欢迎留言讨论。想知道我接下来会写些什么？欢迎订阅我的掘金专栏或知乎专栏：《前端周刊：让你在前端领域跟上时代的脚步》。\r\n\r\nHappy Hacking', '39', '1500452705', '1500532845', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('112', 'ES8 发布及主要特性总览', '哈哈，没时间了，快上车。 ES8 已经正式发布，这篇文章使用实例对 ES8 中确定的语言特性（比如 Object.values、Object.entries、String.padStart、String.padEnd）做了介绍，基础好的同学可以自己去阅读规范原文，此外，掘金翻译计划也把文章翻译成了中文。', '技术动态\r\n##ES8 发布及主要特性总览\r\n哈哈，没时间了，快上车。\r\nES8 已经正式发布，这篇文章使用实例对 ES8 中确定的语言特性（比如 Object.values、Object.entries、String.padStart、String.padEnd）做了介绍，基础好的同学可以自己去阅读规范原文，此外，掘金翻译计划也把文章翻译成了中文。\r\n\r\n###文章教程\r\nJS 项目行军指南\r\n\r\n对于相当比例的工程师，尤其是刚入门的前端工程师来说，开始一个全新的项目就像是在未知领域摸索前行，如果方法不当，维护老项目更是噩梦，那么推进新项目是否有固定的套路可循呢？这篇文章是 Hive 的团队总结出来的 JS 项目行军指南，覆盖了 Git、依赖、测试、文件组织、代码规范等方面。\r\n\r\n###API 安全检查清单\r\n\r\n《清单革命》中提出在医学领域使用检查清单是保障复杂手术成功简单却有效的方法，有人把这种方法论迁移到建筑领域，而软件工程领域同样使用，对于开始接触 JS 后端开发的同学，如何保障 API 服务的安全有很多方面需要考虑，如果想让自己成为思维缜密的工程师，这篇文章及其中提到的概念和技术，非常值得学习。\r\n\r\nawesome-guidelines：编码风格指南\r\n\r\n高质量的代码会体现在表层和结构两方面，表层主要指代码排列、变量命名等方面，结构主要体现在容错、扩展、调试等方面，表层的代码技巧相比结构方面更容易掌握，而通常来说表层很差的代码，结构也好不到哪里去，这篇汇集了很多门语言的编程规范、最佳实践。\r\n\r\n###每个单元测试都必须回答的 5 个问题\r\n\r\n有个难以接受但是残酷的事实，大多数程序员都不知道怎么写测试，测试不仅能帮助你理清对需求的理解，还有利于设计的开展，更直接的是方便持续集成为以后的自动化回归打好基础。那么该怎么写测试？正确的思考都是从提问开始，每个单元测试都要回答 的问题包括：你在测什么？它是干啥的？输入是什么？输出是什么？如何重复测试？\r\n\r\n开发工具\r\nRelease：快速生成仓库的 Changelog\r\n\r\n###Zeit 官方发布的命令行工具，运行之后能自动生成 GitHub Release，并且基于上次发布之后的提交生成本次 Release 的更新日志，如果不了解这种发版流程，建议去看看 React、React Native 的版本更新机制。\r\n\r\n##Chrome 60 DevTools 新功能预览\r\n\r\nChrome 无疑是配备了最好的开发者工具的浏览器，该视频通过实际操作讲解 Chrome 60 中新发布的 DevTools 功能，感兴趣的可以看看。\r\n\r\n代码框架\r\nGifted Chat：React Native 会话式 UI 库\r\n\r\n在 AI 时代，人机交互的方式也有不少新的变化，具体到前端领域，会话式UI（Conversational UI）的崛起尤为显著，微信公号上的自动回复功能也可算作此类，Gifted Chat 是为 React Native 定制的会话式交互组件，在交互细节上做了不少的优化考量，也支持灵活的自定义，如果你最近想做个类似的 APP，应该可以用上。\r\n\r\n###franc：支持超过 800+ 语言的语种检测库\r\n\r\n如果你恰巧也需要在工作中处理多国语言，而需要知道数据库中存储的文本语种，franc 绝对能为你所用，支持超过 800+ 语种，支持计算某段文本属于某种语言的概率，长的文本输入能给你更精确的结果。\r\n\r\n###Markvis：在 Markdown 中输出图表\r\n\r\n不得不说 Markvis 为 Markdown 带来了更加丰富的表现力，支持条形图、饼图，并且这种需求是刚需，在 Markdown 越来越普及的今天。\r\n\r\n找找灵感\r\nPractical Node.js：第2版\r\n\r\nPractical Node.js 开始修订第 2 版了，预计年底会完工，这个仓库是手稿原文，如果你看过的话是不是也可以参与进去呢？该书的第一版评价还比较不错。\r\n\r\nVimGameSnake：在 Vim 中玩贪吃蛇\r\n\r\n代码写累了想在 Vim 里面休闲下？请收下这款游戏吧，不要跟老板说是前端周刊介绍的，哈哈。当然，如果你想在 Vim 中尝试更多的游戏，可以移步：github.com/jmanoel7/vim-games。\r\n\r\nAI 术语中英文对照表\r\n\r\n如果你知道某个领域各种术语对应的英文单词，能看懂英文技术资料就会更容易，前端为什么要关注人工智能？科技发展的趋势是挡不住的，即使不做人工智能的开发，多学点单词也能避免不少拼音式变量名吧。\r\n\r\n##精彩问答\r\n###如何对压缩混淆后的 JS 代码做逆向工程？\r\n```php\r\n\r\n public function getAccess(){\r\n\r\n        //1.获取所有控制器\r\n        $modules = config(\'app.ACCESS_CHECK_MODULE\');\r\n        $modules = explode(\',\',$modules);\r\n        $controllers =[];\r\n        $pris = [];\r\n        //获取基础控制器的方法\r\n        $base_controller = config(\'app.name_space\').\'\\\\\'.\'Controller\';\r\n        $reflection = new ReflectionClass($base_controller);\r\n        $action_base_names = $reflection->getMethods();\r\n        $action_base_name=[];\r\n        foreach ($action_base_names as $v){\r\n            $action_base_name[]=$v->name;\r\n        }\r\n        //循环模块\r\n        foreach ($modules as $mk=>$mv){\r\n            $controllers = $this->getController($mv);\r\n            if($controllers == null){\r\n                continue;\r\n            }\r\n            //循环控制器\r\n            foreach ($controllers as $con){\r\n                $con_name = str_replace(\'Controller\',\'\',basename($con));\r\n                $reflection2 = new ReflectionClass($con);\r\n                $action_names = $reflection2->getMethods();\r\n                //循环方法\r\n                foreach ($action_names as $ak=>$av){\r\n                    $av_real = $av->name;\r\n                    $desc = $av->getDocComment();\r\n                    //控制器名称\r\n                    if (!preg_match(\'/@name\\s+(\\w+)/u\', $desc, $catch)) continue;\r\n\r\n                    $name = $catch[1];\r\n                    //控制器描述\r\n                    $description = preg_match(\'/@desc\\s+(\\w+)/u\', $desc, $catch)\r\n                        ? $catch[1]\r\n                        : \'\';\r\n                    if(in_array($av_real,$action_base_name) || $av_real == \'__construct\'){\r\n                        continue;\r\n                    }else{\r\n                        $pris[] = [\r\n                            \'module_name\' =>$mv,\r\n                            \'controller\' =>$con_name,\r\n                            \'action_name\' =>$av_real,\r\n                            \'pri_name\' =>$name,\r\n                            \'pri_desc\' =>$description\r\n                        ];\r\n                    }\r\n                }\r\n            }\r\n\r\n        }\r\n        return $pris;\r\n    }\r\n    \r\n```\r\n\r\n    \r\n    \r\n\r\n很多前端同学在初入门的时候可能都用到了逆向工程的方法，区别就是逆向的难度大小的问题，通常 CSS、DOM 再明显不过了，你对压缩混淆过的 JS 代码做过逆向工程么？没有的话，读读这篇长文，看看 Alex Kras 是如何做到的。\r\n\r\n###为什么 Reddit 选择了 TypeScript？\r\n\r\nReddit 的前端团队在做重构的时候重新选择了 TypeScript 作为基本的开发语言，他们调研了哪些方案？选择 TypeScript 的理由是什么？如果你时间有限就看最后的结论吧。\r\n\r\n##认真的 JS 开发者必须知道的 10 件事？\r\n\r\n由一个想提高自己的前端工程师发布在 Redit 上的问题，高票答案总结的非常不错，现在的前端工程师跟五年前的前端工程师已经大不相同，如果你想在这个领域立足并成为大牛，这个答案可以作为基础技能检查清单。\r\n\r\nOne More Thing 本文作者王仕军，商业转载请联系作者获得授权，非商业转载请注明出处。如果你觉得本文对你有帮助，请点赞！如果对文中的内容有任何疑问，欢迎留言讨论。想知道我接下来会写些什么？欢迎订阅我的掘金专栏或知乎专栏：《前端周刊：让你在前端领域跟上时代的脚步》。\r\n\r\nHappy Hacking', '40', '1500533361', '1500627456', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('113', '间隔测试', '', '我们都知道 Laravel 是迄今为止最受欢迎的 PHP 框架。 它的目录结构好、组织有序、定义简单。当我们在一个中小型项目工作时，使用 Laravel 提供目录结构是非常友好的。 但是，当它开始成为一个超过 50 个模型的大型应用程序时，我们就已经是一脚踩进自己埋的坑里面了。且再难回头！\r\n\r\n维护一个大的应用程序真的不是开玩笑的，它是需要好好地被思考和设计。而 Laravel 的默认的目录结构对于这种情况明显是心有余而力不足的。\r\n首先，我们可以来看看 Laravel 默认的目录成为大型应用程序产生的变化。\r\nLaravel 默认的目录结构就像这样：\r\n\r\n```\r\n|- app/\r\n   |- Console/\r\n      |- Commands/\r\n   |- Events/\r\n   |- Exceptions/\r\n   |- Http/\r\n      |- Controllers/\r\n      |- Middleware/\r\n   |- Jobs/\r\n   |- Listeners/\r\n   |- Providers/\r\n   |- User.php\r\n|- database/\r\n   |- factories/\r\n   |- migrations/\r\n   |- seeders\r\n|- config/\r\n|- routes/\r\n|- resources/\r\n   |- assets/\r\n   |- lang/\r\n   |- views/\r\n```', '40', '1500543471', '1500543471', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('114', 'ddfafa', '', '1. *有太多的文件要考虑\r\n\r\n* *犯错误的机会很高\r\n\r\n* *容易让开发者沮丧\r\n\r\n1. *有时需要重新考虑域名之间的逻辑\r\n\r\n* *新的开发者？还是洗洗睡吧！##标题文字##\r\n\r\n```\r\n...\r\npublic function register(array $attr) {\r\n    ...\r\n}\r\npublic function login(array $credentials) {\r\n    ... \r\n}\r\npublic function logout() {\r\n    ...\r\n}\r\n...\r\n```', '40', '1500544240', '1500544748', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('115', '代码测试', '', 'ES8 发布及主要特性总览\r\n哈哈，没时间了，快上车。 ES8 已经正式发布，这篇文章使用实例对 ES8 中确定的语言特性（比如 Object.values、Object.entries、String.padStart、String.padEnd）做了介绍，基础好的同学可以自己去阅读规范原文，此外，掘金翻译计划也把文章翻译成了中文。\r\n\r\n##文章教程\r\nJS 项目行军指南\r\n\r\n对于相当比例的工程师，尤其是刚入门的前端工程师来说，开始一个全新的项目就像是在未知领域摸索前行，如果方法不当，维护老项目更是噩梦，那么推进新项目是否有固定的套路可循呢？这篇文章是 Hive 的团队总结出来的 JS 项目行军指南，覆盖了 Git、依赖、测试、文件组织、代码规范等方面。\r\n\r\nAPI 安全检查清单\r\n《清单革命》中提出在医学领域使用检查清单是保障复杂手术成功简单却有效的方法，有人把这种方法论迁移到建筑领域，而软件工程领域同样使用，对于开始接触 JS 后端开发的同学，如何保障 API 服务的安全有很多方面需要考虑，如果想让自己成为思维缜密的工程师，这篇文章及其中提到的概念和技术，非常值得学习。\r\n\r\nawesome-guidelines：编码风格指南\r\n\r\n高质量的代码会体现在表层和结构两方面，表层主要指代码排列、变量命名等方面，结构主要体现在容错、扩展、调试等方面，表层的代码技巧相比结构方面更容易掌握，而通常来说表层很差的代码，结构也好不到哪里去，这篇汇集了很多门语言的编程规范、最佳实践。\r\n\r\n每个单元测试都必须回答的 5 个问题\r\n有个难以接受但是残酷的事实，大多数程序员都不知道怎么写测试，测试不仅能帮助你理清对需求的理解，还有利于设计的开展，更直接的是方便持续集成为以后的自动化回归打好基础。那么该怎么写测试？正确的思考都是从提问开始，每个单元测试都要回答 的问题包括：你在测什么？它是干啥的？输入是什么？输出是什么？如何重复测试？\r\n\r\n开发工具 Release：快速生成仓库的 Changelog\r\n\r\nZeit 官方发布的命令行工具，运行之后能自动生成 GitHub Release，并且基于上次发布之后的提交生成本次 Release 的更新日志，如果不了解这种发版流程，建议去看看 React、React Native 的版本更新机制。\r\n##Chrome 60 DevTools 新功能预览\r\n\r\nChrome 无疑是配备了最好的开发者工具的浏览器，该视频通过实际操作讲解 Chrome 60 中新发布的 DevTools 功能，感兴趣的可以看看。\r\nfranc：支持超过 800+ 语言的语种检测库\r\n如果你恰巧也需要在工作中处理多国语言，而需要知道数据库中存储的文本语种，franc 绝对能为你所用，支持超过 800+ 语种，支持计算某段文本属于某种语言的概率，长的文本输入能给你更精确的结果。\r\n\r\n##Markvis：在 Markdown 中输出图表\r\n不得不说 Markvis 为 Markdown 带来了更加丰富的表现力，支持条形图、饼图，并且这种需求是刚需，在 Markdown 越来越普及的今天。\r\n\r\n找找灵感 Practical Node.js：第2版\r\n\r\nPractical Node.js 开始修订第 2 版了，预计年底会完工，这个仓库是手稿原文，如果你看过的话是不是也可以参与进去呢？该书的第一版评价还比较不错。\r\n\r\nVimGameSnake：在 Vim 中玩贪吃蛇\r\n\r\n代码写累了想在 Vim 里面休闲下？请收下这款游戏吧，不要跟老板说是前端周刊介绍的，哈哈。当然，如果你想在 Vim 中尝试更多的游戏，可以移步：github.com/jmanoel7/vim-games。\r\n\r\nAI 术语中英文对照表\r\n\r\n如果你知道某个领域各种术语对应的英文单词，能看懂英文技术资料就会更容易，前端为什么要关注人工智能？科技发展的趋势是挡不住的，即使不做人工智能的开发，多学点单词也能避免不少拼音式变量名吧。\r\n\r\n###精彩问答\r\n如何对压缩混淆后的 JS 代码做逆向工程？\r\n```php\r\n<?php\r\n\r\n# install symfony/var-dump to your project\r\n# composer require symfony/var-dumper\r\n\r\n// use namespace\r\nuse Symfony\\Component\\VarDumper\\Cloner\\VarCloner;\r\nuse Symfony\\Component\\VarDumper\\Dumper\\CliDumper;\r\nuse Symfony\\Component\\VarDumper\\Dumper\\HtmlDumper as SymfonyHtmlDumper;\r\n\r\n/**\r\n * Class HtmlDumper\r\n */\r\nclass HtmlDumper extends SymfonyHtmlDumper\r\n{\r\n    /**\r\n     * Colour definitions for output.\r\n     *\r\n     * @var array\r\n     */\r\n    protected $styles = [\r\n        \'default\' => \'background-color:#fff; color:#222; line-height:1.2em; font-weight:normal; font:12px Monaco, Consolas, monospace; word-wrap: break-word; white-space: pre-wrap; position:relative; z-index:100000\',\r\n        \'num\' => \'color:#a71d5d\',\r\n        \'const\' => \'color:#795da3\',\r\n        \'str\' => \'color:#df5000\',\r\n        \'cchr\' => \'color:#222\',\r\n        \'note\' => \'color:#a71d5d\',\r\n        \'ref\' => \'color:#a0a0a0\',\r\n        \'public\' => \'color:#795da3\',\r\n        \'protected\' => \'color:#795da3\',\r\n        \'private\' => \'color:#795da3\',\r\n        \'meta\' => \'color:#b729d9\',\r\n        \'key\' => \'color:#df5000\',\r\n        \'index\' => \'color:#a71d5d\',\r\n    ];\r\n}\r\n\r\n/**\r\n * Class Dumper\r\n */\r\nclass Dumper\r\n{\r\n    /**\r\n     * Dump a value with elegance.\r\n     *\r\n     * @param  mixed  $value\r\n     * @return void\r\n     */\r\n    public function dump($value)\r\n    {\r\n        if (class_exists(CliDumper::class)) {\r\n            $dumper = \'cli\' === PHP_SAPI ? new CliDumper : new HtmlDumper;\r\n            $dumper->dump((new VarCloner)->cloneVar($value));\r\n        } else {\r\n            var_dump($value);\r\n        }\r\n    }\r\n}\r\n\r\nif (! function_exists(\'dd\')) {\r\n    /**\r\n     * Dump the passed variables and end the script.\r\n     *\r\n     * @param  mixed\r\n     * @return void\r\n     */\r\n    function dd(...$args)\r\n    {\r\n        foreach ($args as $x) {\r\n            (new Dumper)->dump($x);\r\n        }\r\n        die(1);\r\n    }\r\n}\r\n\r\nif (! function_exists(\'dda\')) {\r\n    /**\r\n     * Dump the passed array variables and end the script.\r\n     *\r\n     * @param  mixed\r\n     * @return void\r\n     */\r\n    function dda(...$args)\r\n    {\r\n        foreach ($args as $x) {\r\n            (new Dumper)->dump($x->toArray());\r\n        }\r\n        die(1);\r\n    }\r\n}\r\n```\r\n\r\n--END', '40', '1500620340', '1500620340', '1', '0', '0');

-- ----------------------------
-- Table structure for blog_category
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '分类名',
  `intro` varchar(255) NOT NULL DEFAULT '' COMMENT '简介',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `input_id` int(10) NOT NULL DEFAULT '0' COMMENT '录入人员Id',
  `deleted_at` tinyint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('36', 'dd', '', '0', '1499916878', '0', '1');
INSERT INTO `blog_category` VALUES ('37', '', '', '1499916434', '1499916875', '0', '1');
INSERT INTO `blog_category` VALUES ('38', '', '', '1499916501', '1499916883', '0', '1');
INSERT INTO `blog_category` VALUES ('39', 'ddffff333ff', 'ddff333ff', '1499916623', '1499997555', '0', '0');
INSERT INTO `blog_category` VALUES ('40', '中文分类', '中文分类', '1499916853', '1500016222', '0', '0');
INSERT INTO `blog_category` VALUES ('41', 'dddddd88', 'dddddd88', '1499997125', '1499997315', '0', '0');
INSERT INTO `blog_category` VALUES ('42', '中文的上下', '中文的上下', '1500016196', '1500016196', '0', '0');

-- ----------------------------
-- Table structure for blog_privilege
-- ----------------------------
DROP TABLE IF EXISTS `blog_privilege`;
CREATE TABLE `blog_privilege` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `pri_name` varchar(30) NOT NULL DEFAULT '' COMMENT '权限名称',
  `pri_desc` varchar(30) NOT NULL DEFAULT '' COMMENT '权限描述',
  `module_name` varchar(30) NOT NULL DEFAULT '' COMMENT '权限名称',
  `controller` varchar(30) NOT NULL DEFAULT '' COMMENT '控制器名称',
  `action_name` varchar(30) NOT NULL DEFAULT '' COMMENT '方法名称',
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) NOT NULL DEFAULT '0',
  `deleted_at` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of blog_privilege
-- ----------------------------
INSERT INTO `blog_privilege` VALUES ('77', '后台管理员首页', '后台管理员首页', 'Admin', 'Admin', 'index', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('78', '添加管理员页面', '添加管理员', 'Admin', 'Admin', 'add', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('79', '添加操作', '添加操作', 'Admin', 'Admin', 'addOperate', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('80', '修改页面', '修改页面', 'Admin', 'Admin', 'edit', '1497927205', '1497927324', '0');
INSERT INTO `blog_privilege` VALUES ('81', '修改操作', '修改操作', 'Admin', 'Admin', 'editOperate', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('82', '删除用户', '删除用户', 'Admin', 'Admin', 'delete', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('83', '后台首页', '后台首页', 'Admin', 'Index', 'index', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('84', '权限首页', '权限首页', 'Admin', 'Privilege', 'index', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('90', '后台角色首页', '后台角色首页', 'Admin', 'Role', 'index', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('91', '添加角色页面', '添加角色', 'Admin', 'Role', 'add', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('92', '添加操作', '添加操作', 'Admin', 'Role', 'addOperate', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('93', '修改页面', '修改页面', 'Admin', 'Role', 'edit', '1497927205', '1497941141', '0');
INSERT INTO `blog_privilege` VALUES ('94', '修改操作', '修改操作', 'Admin', 'Role', 'editOperate', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('95', '删除角色', '删除角色', 'Admin', 'Role', 'delete', '1497927205', '1497927205', '0');
INSERT INTO `blog_privilege` VALUES ('96', '为管理员分配角色列表', '为管理员分配角色', 'Admin', 'Role', 'addUser', '1497927205', '1497946911', '0');
INSERT INTO `blog_privilege` VALUES ('100', '刷新权限', '刷新权限', 'Admin', 'Privilege', 'refresh', '1497946735', '1497946735', '0');
INSERT INTO `blog_privilege` VALUES ('102', '为管理员分配角色操作', '为管理员分配角色', 'Admin', 'Role', 'addUserOperate', '1497946855', '1497946911', '0');
INSERT INTO `blog_privilege` VALUES ('103', '更新添加角色权限', '更新添加角色权限', 'Admin', 'Privilege', 'updateRolePri', '1498008120', '1498008120', '0');
INSERT INTO `blog_privilege` VALUES ('104', '博客首页', '博客首页', 'Admin', 'Article', 'index', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('105', '添加文章页面', '添加文章页面', 'Admin', 'Article', 'add', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('106', '添加文章操作', '添加文章操作', 'Admin', 'Article', 'addOperate', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('107', '修改页面', '修改页面', 'Admin', 'Article', 'edit', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('108', '修改操作', '修改操作', 'Admin', 'Article', 'editOperate', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('109', '删除文章', '删除文章', 'Admin', 'Article', 'delete', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('110', '获取全部标签', '获取全部标签', 'Admin', 'Article', 'getTags', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('111', '分类首页', '分类首页', 'Admin', 'Cat', 'index', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('112', '添加分类页面', '添加分类页面', 'Admin', 'Cat', 'add', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('113', '添加分类操作', '添加分类操作', 'Admin', 'Cat', 'addOperate', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('114', '修改页面', '修改页面', 'Admin', 'Cat', 'edit', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('115', '修改操作', '修改操作', 'Admin', 'Cat', 'editOperate', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('116', '删除分类', '删除分类', 'Admin', 'Cat', 'delete', '1500025995', '1500025995', '0');
INSERT INTO `blog_privilege` VALUES ('117', '标签首页', '标签首页', 'Admin', 'Tag', 'index', '1500025996', '1500025996', '0');
INSERT INTO `blog_privilege` VALUES ('118', '添加标签页面', '添加标签页面', 'Admin', 'Tag', 'add', '1500025996', '1500025996', '0');
INSERT INTO `blog_privilege` VALUES ('119', '添加标签操作', '添加标签操作', 'Admin', 'Tag', 'addOperate', '1500025996', '1500025996', '0');
INSERT INTO `blog_privilege` VALUES ('120', '修改页面', '修改页面', 'Admin', 'Tag', 'edit', '1500025996', '1500025996', '0');
INSERT INTO `blog_privilege` VALUES ('121', '修改操作', '修改操作', 'Admin', 'Tag', 'editOperate', '1500025996', '1500025996', '0');
INSERT INTO `blog_privilege` VALUES ('122', '删除标签', '删除标签', 'Admin', 'Tag', 'delete', '1500025996', '1500025996', '0');

-- ----------------------------
-- Table structure for blog_role
-- ----------------------------
DROP TABLE IF EXISTS `blog_role`;
CREATE TABLE `blog_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) NOT NULL DEFAULT '0',
  `input_id` int(11) NOT NULL DEFAULT '0' COMMENT '录入人ID',
  `deleted_at` tinyint(5) NOT NULL DEFAULT '0' COMMENT '删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='角色表';

-- ----------------------------
-- Records of blog_role
-- ----------------------------
INSERT INTO `blog_role` VALUES ('1', '超级管理员', '1497939509', '1498025253', '0', '0');
INSERT INTO `blog_role` VALUES ('6', 'test', '1498188946', '1498188946', '0', '0');
INSERT INTO `blog_role` VALUES ('7', 'blog_test', '1500026048', '1500026048', '0', '0');

-- ----------------------------
-- Table structure for blog_role_pri
-- ----------------------------
DROP TABLE IF EXISTS `blog_role_pri`;
CREATE TABLE `blog_role_pri` (
  `pri_id` mediumint(8) unsigned NOT NULL COMMENT '权限Id',
  `role_id` mediumint(8) unsigned NOT NULL COMMENT '角色Id',
  `status` tinyint(5) NOT NULL DEFAULT '0',
  KEY `pri_id` (`pri_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色权限表';

-- ----------------------------
-- Records of blog_role_pri
-- ----------------------------
INSERT INTO `blog_role_pri` VALUES ('77', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('78', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('79', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('80', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('81', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('82', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('83', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('84', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('90', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('91', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('92', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('93', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('94', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('95', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('96', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('100', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('102', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('103', '5', '0');
INSERT INTO `blog_role_pri` VALUES ('77', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('78', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('79', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('80', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('81', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('82', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('83', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('84', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('90', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('91', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('92', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('93', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('94', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('95', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('96', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('100', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('102', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('103', '1', '0');
INSERT INTO `blog_role_pri` VALUES ('77', '6', '0');
INSERT INTO `blog_role_pri` VALUES ('78', '6', '0');
INSERT INTO `blog_role_pri` VALUES ('79', '6', '0');
INSERT INTO `blog_role_pri` VALUES ('80', '6', '0');
INSERT INTO `blog_role_pri` VALUES ('81', '6', '0');
INSERT INTO `blog_role_pri` VALUES ('82', '6', '0');
INSERT INTO `blog_role_pri` VALUES ('83', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('104', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('105', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('106', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('107', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('108', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('109', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('110', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('111', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('112', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('113', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('114', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('115', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('116', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('117', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('118', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('119', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('120', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('121', '7', '0');
INSERT INTO `blog_role_pri` VALUES ('122', '7', '0');

-- ----------------------------
-- Table structure for blog_tag
-- ----------------------------
DROP TABLE IF EXISTS `blog_tag`;
CREATE TABLE `blog_tag` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '标签名',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `input_id` int(10) NOT NULL DEFAULT '0' COMMENT '录入人员Id',
  `deleted_at` tinyint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='文章标签表';

-- ----------------------------
-- Records of blog_tag
-- ----------------------------
INSERT INTO `blog_tag` VALUES ('36', 'ettff3333', '1499917326', '1499917700', '0', '0');
INSERT INTO `blog_tag` VALUES ('37', 'dddd', '1499917343', '1499917707', '0', '1');
INSERT INTO `blog_tag` VALUES ('38', 'f3', '1499917739', '1499997811', '0', '1');
INSERT INTO `blog_tag` VALUES ('39', 'df', '1499997800', '1499997828', '0', '1');
INSERT INTO `blog_tag` VALUES ('40', 'fffff', '1499997868', '1499997872', '0', '1');
INSERT INTO `blog_tag` VALUES ('41', 'php', '1500023079', '1500023079', '0', '0');
INSERT INTO `blog_tag` VALUES ('42', 'laravel', '1500023247', '1500023247', '0', '0');
INSERT INTO `blog_tag` VALUES ('43', 'ff', '1500255870', '1500255870', '0', '0');
INSERT INTO `blog_tag` VALUES ('44', 'fuck', '1500255870', '1500255870', '0', '0');

-- ----------------------------
-- Table structure for blog_tag_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_tag_article`;
CREATE TABLE `blog_tag_article` (
  `tag_id` int(11) NOT NULL DEFAULT '0',
  `article_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_tag_article
-- ----------------------------
INSERT INTO `blog_tag_article` VALUES ('41', '47');
INSERT INTO `blog_tag_article` VALUES ('42', '47');
INSERT INTO `blog_tag_article` VALUES ('41', '53');
INSERT INTO `blog_tag_article` VALUES ('42', '54');
INSERT INTO `blog_tag_article` VALUES ('44', '112');
INSERT INTO `blog_tag_article` VALUES ('42', '112');
INSERT INTO `blog_tag_article` VALUES ('41', '103');
INSERT INTO `blog_tag_article` VALUES ('41', '104');
INSERT INTO `blog_tag_article` VALUES ('41', '112');

-- ----------------------------
-- Table structure for blog_users
-- ----------------------------
DROP TABLE IF EXISTS `blog_users`;
CREATE TABLE `blog_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  `avatar_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of blog_users
-- ----------------------------
INSERT INTO `blog_users` VALUES ('2', 'ycp', '820363773@qq.com', '$2y$10$qWMPIPnETOrHNWGZ5cHyaOee3UL28rgcScDXZY8udcf6rUiExfdpW', 'g5ofNtMizDTmRcux06K4EWZTbj5kx5UEUUzrEIJN3p65gf0pOxOATVXSXjXJ', '2017', '1501040989', '');
INSERT INTO `blog_users` VALUES ('4', 'ycp19940225', '820363773@qq.com', '', null, '1500976546', '1500976546', 'https://avatars0.githubusercontent.com/u/21313827?v=4');
INSERT INTO `blog_users` VALUES ('5', 'ycp', '820363772@qq.com', '$2y$10$oFAlAIWs0dfjOzsxXKbbc.QVMUr4Lus6Pi1kAa18TAM61ihjzPQbW', null, '1501034553', '1501034553', '');
INSERT INTO `blog_users` VALUES ('6', 'yyy', '820363771@qq.com', '$2y$10$JQoyfhsm7yuPfpnt8IaMIOdpFIWR8oQYHntC2iyzmcq2SBDfQsHVW', null, '1501036665', '1501036665', '');
INSERT INTO `blog_users` VALUES ('7', '也一样一样', '820363770@qq.com', '$2y$10$DcHkJlgrLtFVhUDgnN7DoudyGK5Gbvu/dl41Kou3RCnn4gr.2B/YK', null, '1501036990', '1501036990', '');
INSERT INTO `blog_users` VALUES ('8', '恩恩', '120363773@qq.com', '$2y$10$Usno297Bcx183IWiKBEzi.MigX70u6VI.iUUP9E2Hkgtg4mJCBxAq', null, '1501037131', '1501037131', '');
INSERT INTO `blog_users` VALUES ('9', '点', '829363773@qq.com', '$2y$10$XoY15IP58u5Gr74Rr.Aem.kCw022VoOEe3bRscPDIDBFz2t6QM/Va', null, '1501037210', '1501037210', '');
INSERT INTO `blog_users` VALUES ('10', '电放费', '820343773@qq.com', '$2y$10$ZUXcPpWBTwVK24f8yGLhRO6YmZwYqELnFAzBT1RE8.tHZ3kMbioyC', null, '1501037742', '1501037742', '');

-- ----------------------------
-- Table structure for chat_messages
-- ----------------------------
DROP TABLE IF EXISTS `chat_messages`;
CREATE TABLE `chat_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of chat_messages
-- ----------------------------
INSERT INTO `chat_messages` VALUES ('1', 'Howdy everyone', '2', '2017-07-03 16:43:42', '2017-07-03 16:43:42');
INSERT INTO `chat_messages` VALUES ('2', 'Howdy everyone', '2', '2017-07-03 16:44:42', '2017-07-03 16:44:42');
INSERT INTO `chat_messages` VALUES ('3', 'Howdy everyone', '2', '2017-07-03 16:47:07', '2017-07-03 16:47:07');
INSERT INTO `chat_messages` VALUES ('4', 'Howdy everyone', '2', '2017-07-03 16:47:28', '2017-07-03 16:47:28');
INSERT INTO `chat_messages` VALUES ('5', 'Howdy everyone', '2', '2017-07-03 16:48:52', '2017-07-03 16:48:52');
INSERT INTO `chat_messages` VALUES ('6', 'Howdy everyone', '2', '2017-07-03 16:49:02', '2017-07-03 16:49:02');
INSERT INTO `chat_messages` VALUES ('7', 'Howdy everyone', '2', '2017-07-03 16:49:26', '2017-07-03 16:49:26');
INSERT INTO `chat_messages` VALUES ('8', 'Howdy everyone', '2', '2017-07-03 16:50:33', '2017-07-03 16:50:33');
INSERT INTO `chat_messages` VALUES ('9', 'Howdy everyone', '2', '2017-07-03 16:51:16', '2017-07-03 16:51:16');
INSERT INTO `chat_messages` VALUES ('10', 'Howdy everyone', '2', '2017-07-03 17:03:21', '2017-07-03 17:03:21');
INSERT INTO `chat_messages` VALUES ('11', 'Howdy everyone', '2', '2017-07-03 17:05:54', '2017-07-03 17:05:54');
INSERT INTO `chat_messages` VALUES ('12', 'Howdy everyone', '2', '2017-07-03 17:07:04', '2017-07-03 17:07:04');
INSERT INTO `chat_messages` VALUES ('13', 'Howdy everyone', '2', '2017-07-03 17:07:14', '2017-07-03 17:07:14');
INSERT INTO `chat_messages` VALUES ('14', 'Howdy everyone', '2', '2017-07-03 17:08:06', '2017-07-03 17:08:06');
INSERT INTO `chat_messages` VALUES ('15', 'Howdy everyone', '2', '2017-07-03 17:11:05', '2017-07-03 17:11:05');
INSERT INTO `chat_messages` VALUES ('16', 'Howdy everyone', '2', '2017-07-03 17:11:41', '2017-07-03 17:11:41');
INSERT INTO `chat_messages` VALUES ('17', 'Howdy everyone', '2', '2017-07-03 17:14:19', '2017-07-03 17:14:19');
INSERT INTO `chat_messages` VALUES ('18', 'Howdy everyone', '2', '2017-07-03 17:14:57', '2017-07-03 17:14:57');
INSERT INTO `chat_messages` VALUES ('19', 'Howdy everyone', '2', '2017-07-03 17:15:10', '2017-07-03 17:15:10');
INSERT INTO `chat_messages` VALUES ('20', 'Howdy everyone', '2', '2017-07-03 17:15:21', '2017-07-03 17:15:21');
INSERT INTO `chat_messages` VALUES ('21', 'Howdy everyone', '2', '2017-07-03 17:15:45', '2017-07-03 17:15:45');
INSERT INTO `chat_messages` VALUES ('22', 'Howdy everyone', '2', '2017-07-03 17:18:44', '2017-07-03 17:18:44');
INSERT INTO `chat_messages` VALUES ('23', 'Howdy everyone', '2', '2017-07-03 17:30:13', '2017-07-03 17:30:13');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2', '2017_06_08_061045_create_role_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
