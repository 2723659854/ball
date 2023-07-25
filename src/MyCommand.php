<?php

namespace Xiaosongshu\Admin;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MyCommand extends Command
{

    protected static $defaultName = 'my:controller';

    protected static $defaultDescription = "使用命令行生成一个控制器";

    public function configure()
    {
        $this->addArgument('name',InputArgument::REQUIRED,'控制器的名称');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $output->writeln("你输入的控制器的名称是：{$name}");
        $this->createController($name);
        return self::SUCCESS;
    }

    public function createController(string $name){
 /** 这里是创建控制器需要写入的内容，这里的两个定界符必须定格写，否则会报错标签不是闭合的 */
$content = <<<EOF
<?php
namespace app\controller;

class $name
{
    public function index(){
        /** 这里定义变量和使用变量都要使用转义符\ 否则会报错 ，未定义的变量，下面使用变量同样的也要这么写 */
        \$class = get_called_class();
        var_dump(\$class);
        echo "我是index方法";
    }
}

EOF;
        file_put_contents(app_path().'/controller/'.$name.'.php',$content);
    }
}