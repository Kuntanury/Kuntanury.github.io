#从零开始Swift - TableView

> 自失恋后浑浑噩噩至今，开Blog自我鼓励鞭策

##初建
建立一个简单的项目，整个结构跟C++中的类都很相似。

~~~swift
class ViewController: UIViewController {
    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view, typically from a nib.
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
}
~~~

##初始化

这里尝试了好多次，swift的提示信息还不太完善，对于我这种习惯了如下书写方式的懒汉确实写着有点累。。

~~NSArray showNameArray;~~

~~~swift
    var showNameArray :[String] = ["Hello", "World"]
~~~

从SB扯出来outlet, 设置约束，现在ViewController如下了

~~~swift
class ViewController: UIViewController {

    var showNameArray :[String] = ["Hello", "World"]
    @IBOutlet weak var showNameTableView: UITableView!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view, typically from a nib.
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
}
~~~

##继承代理
~~~swift
	class ViewController: UIViewController, UITableViewDelegate, UITableViewDataSource
~~~
加上两个代理之后直接就issue了

~~~swift
 	Type 'ViewController' does not conform to protocol 'UITableViewDataSource'
~~~
没关系，其实只是我们没有实现代理方法而已，提示真的好可怕。。。

##实现代理方法

~~~swift
 	func tableView(tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return 0
    }
    
    func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        return UITableViewCell()
    }
    
    func tableView(tableView: UITableView, didSelectRowAtIndexPath indexPath: NSIndexPath) {
    }
~~~
好了，issue消失了~

接下来添加我们自己的数据

~~~swift
    func tableView(tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return showNameArray.count
    }
    
    func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        
        if let cell:UITableViewCell = tableView.dequeueReusableCellWithIdentifier("Cell") {
            
            cell.textLabel?.text = showNameArray[indexPath.row];
            
            cell.selectionStyle = UITableViewCellSelectionStyle.None
            
            return cell
        } else {
            let cell = UITableViewCell.init(style: UITableViewCellStyle.Default, reuseIdentifier: "Cell");
            
            cell.selectionStyle = UITableViewCellSelectionStyle.None
            
            cell.textLabel?.text = showNameArray[indexPath.row];
            
            return cell
        }
        

    }
    
    func tableView(tableView: UITableView, didSelectRowAtIndexPath indexPath: NSIndexPath) {
        
    }
~~~

ok,一个小小的TableView就此完成

##后记
整个小demo写下来给我一种回到学校的感觉，这个是变量，这个是类，类要继承方法，init get set，整个写下来还是挺好玩的，坚持下去。