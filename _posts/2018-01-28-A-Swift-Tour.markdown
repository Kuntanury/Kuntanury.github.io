---
layout:     post
title:      "The Swift Programming Language (Swift 4) 中文版 3"
subtitle:   "A Swift Tour - 管中窥豹"
date:       2018-01-28 09:00:00
author:     "Kuntanury"
header-img: "img/post_bg_swift.png"
catalog:    true
tags:
    - Swift
    - Swift翻译

---
# 管中窥豹

依照传统，使用新语言写的第一个程序都应该是在屏幕上打印 “Hello, world!” ，用 Swift ，一行搞定：

~~~swift
print("Hello, world!")
~~~

如果你曾经写过 C 或者 Objective-C 代码，那么你对 Swift 的语法不会感觉到陌生，在 Swift 中，上面的一行代码就是一个完整的程序，不需要引入单独的库或者I/O模块或者字符串处理神马的，因为写在全局范围的代码被当作程序的入口，所以你连 `main()` 函数都省了，也不用在每句话结尾写分号了。

本节通过运用 Swfit 完成编程任务的方式，来让你 Swift 的有充足的了解。如果有什么地方不理解也不要担心——这个概览介绍的内容在本书的余下章节里都会进行详细解释的。

> **备注**
>
> 为了获得最佳体验，推荐用 Xcode 创建 playground 来试验本章内容，Playgrounds 允许你编辑代码并立即看到代码的运算结果。
>
>[下载Playground](https://developer.apple.com/library/content/documentation/Swift/Conceptual/Swift_Programming_Language/GuidedTour.playground.zip)

### 简单值
用 `let ` 声明常量，用 `var` 声明变量。常量在定义时不需要初始值，但是后续只能对它赋一次值。也就是说，你可以用常量来定义一个在很多地方用到的统一的值：

~~~swift
var myVariable = 42
myVariable = 50
let myConstant = 42
~~~

常量或变量的类型必须和赋值类型一样，然而，你却不需要写明类型，因为编译器可以根据你赋值的类型来推断他们类型：比如在上面的例子中， `myVariable` 初始化的值为整型数字，所以编译器推断它的类型为整型。

如果初始化值未能提供足够的推断信息（或者没有初始值），可以显式的将类型写在变量的后面，用冒号与变量隔开：

~~~swift
let implicitInteger = 70
let implicitDouble = 70.0
let explicitDouble: Double = 70
~~~

> **小试身手**
>
> 创建一个显式类型为 Float 的值为 4 的常量。

值永远不会隐式转换为其他类型。如果你需要把一个值转换成不同类型，可以用显式类型转换来取得目标类型：

~~~swift
let label = "The width is "
let width = 94
let widthLabel = label + String(width)
~~~

> **小试身手**
>
> 尝试一下把最后一行的 String 类型转换去掉，看看编译器报什么错？


有一个更为简单的方法来将值转化为字符串——将值放在前面带有反斜线的括号 (`\`) 里，如下所示：

~~~swift
let apples = 3
let oranges = 5
let appleSummary = "I have \(apples) apples."
let fruitSummary = "I have \(apples + oranges) pieces of fruit."
~~~

> **小试身手**
>
> 在一句欢迎语中用 \() 来把一个浮点运算结果转化为字符串并和某人的名字拼接起来

用三双引号 `"""` 来定义多行的字符串，每行字符的缩进都和结束的三双引号的缩进相同，如下所示（官方文档此处对举例做了简化，举例及注释为个人添加，与原版有出入）：

~~~swift
let quotation = """
（空格)Even though there's whitespace to the left,//即使左边有空白字符
（空格)the actual lines aren't indented.//实际是不会包含在多行字符里面的
（空格)（空格)Except for this line.//除了这行包含1个空格
（空格)Double quotes (") can appear without being escaped.//双引号可以不用转义

（空格)I still have \(apples + oranges) pieces of fruit.//我还有几个苹果和橘子呢
（空格)""" //以一个空格为竖向标准线
~~~

用方括号 `[]` 创建数组和字典，而访问的时候则是通过用方括号中写索引值或者键值的方式。最后一个元素后多加个逗号无碍：

~~~swift
var shoppingList = ["catfish", "water", "tulips", "blue paint"]
shoppingList[1] = "bottle of water"

var occupations = [
    "Malcolm": "Captain",
    "Kaylee": "Mechanic",
]
occupations["Jayne"] = "Public Relations"
~~~

用初始化语法创建一个空的数组或字典：

~~~swift
let emptyArray = [String]()
let emptyDictionary = [String: Float]()
~~~

如果元素类型可推导，你可以用 `[]` 初始化数组，用 `[:]` 初始化字典，就像你给变量赋值或者给函数传参数一样：

~~~swift
shoppingList = []
occupations = [:]
~~~

### 控制流程

用 `if` 和 `switch` 来做条件判断, `for-in` ， `while` 和 `repeat-while` 用来做循环。判断条件和循环变量的圆括号可以省略，但是语句体的大括号不能：

~~~swift
let individualScores = [75, 43, 103, 87, 12]
var teamScore = 0
for score in individualScores {
    if score > 50 {
        teamScore += 3
    } else {
        teamScore += 1
    }
}
print(teamScore)
~~~

在 `if` 语句中，判断条件必须是一个返回布尔值的表达式——也就是说 `if score { ... }` 这类写法是错误的，因为编译器不会隐式地与零值做比较。

你可以兼用 `if` 和 `let` 来处理赋值的变量可能为空的情况，这些赋值的变量表现为可选类型。可选类型或有确定值，或用 `nil` 来表示空值。在类型后添加 `?` 来表示变量为可选类型：

~~~swift
var optionalString: String? = "Hello"
print(optionalString == nil)

var optionalName: String? = "John Appleseed"
var greeting = "Hello!"
if let name = optionalName {
    greeting = "Hello, \(name)"
}
~~~

> **小试身手**
>
> 把 `optionalName` 值改为 `nil` ， greeting输出什么？添加 `else` 分句：如果 `optionalName` 值为 `nil` 输出不同的问候语。

如果可选类型值为 `nil` ，由于判断条件为 `false` ，花括号中的代码就被跳过了。反之，可选类型的值就会被解包并赋给 `let` 声明的常量，这样，解包的值能够在花括号中可用了。

另一个处理可选类型值的方式是用 ?? 来提供一个默认值，如果可选类型值为空，就使用默认值：

~~~swift
let nickName: String? = nil
let fullName: String = "John Appleseed"
let informalGreeting = "Hi \(nickName ?? fullName)"
~~~

Switch语句支持任意数据类型的各种比较操作——不拘泥于整数及等式检测：

~~~swift
let vegetable = "red pepper"
switch vegetable {
case "celery":
    print("Add some raisins and make ants on a log.")
case "cucumber", "watercress":
    print("That would make a good tea sandwich.")
case let x where x.hasSuffix("pepper"):
    print("Is it a spicy \(x)?")
default:
    print("Everything tastes good in soup.")
}
~~~

> **小试身手**
>
> 把 default 结果删掉，看看报什么错？

留意一下上例中 `let` 的用法：通过将匹配式的值赋给常量的方式使得在判断分支中可以调用匹配式的值。

运行完 switch 语句中 case 匹配的代码后，程序就会结束整个选择。由于不在自动执行下一个判断，所以每个分支中的代码不需要加 break 来结束选择。

你可以 `for-in` 遍历代表键值对的一对值的方式来遍历字典。字典是无序的，所以遍历也是无序的：

~~~swift
let interestingNumbers = [
    "Prime": [2, 3, 5, 7, 11, 13],
    "Fibonacci": [1, 1, 2, 3, 5, 8],
    "Square": [1, 4, 9, 16, 25],
]
var largest = 0
for (kind, numbers) in interestingNumbers {
    for number in numbers {
        if number > largest {
            largest = number
        }
    }
}
print(largest)
~~~

> **小试身手**
>
> 添加另一个变量来记录最大值的类型，同时仍然记录这个最大值。

用 `while` 设定一个条件来循环执行一段代码。如果把循环条件写在结尾，可以保证循环至少执行一次：

~~~swift
var n = 2
while n < 100 {
    n *= 2
}
print(n)

var m = 2
repeat {
    m *= 2
} while m < 100
print(m)
~~~

通过 `..<` 可以在循环中设定一个索引来约束范围：

~~~swift
var total = 0
for i in 0..<4 {
    total += i
}
print(total)
~~~

用 `..<` 约束的范围不包括上界的值，用 `...` 可以设定同时包含上下界值的范围。

### 函数和闭包

用 `func` 来声明一个函数，用函数名和括号内的参数来调用这个函数。用 `->` 分割参数名和函数返回类型：

~~~swift
func greet(person: String, day: String) -> String {
    return "Hello \(person), today is \(day)."
}
greet(person: "Bob", day: "Tuesday")
~~~

> **小试身手**
>
> 去掉 day 参数，在问候语中加上一个具体午餐的参数。

一般情况下，函数用形参作为实参标签。实参标签也可以通过写在形参前的标签来自定义，或者用 _ 来表示无实参标签：

~~~swift
func greet(_ person: String, on day: String) -> String {
    return "Hello \(person), today is \(day)."
}
greet("John", on: "Wednesday")
~~~

用元组来创建复合值——例如，让函数来返回多个值。元组中的元素可以用名称或者索引来表示：

~~~swift
func calculateStatistics(scores: [Int]) -> (min: Int, max: Int, sum: Int) {
    var min = scores[0]
    var max = scores[0]
    var sum = 0

    for score in scores {
        if score > max {
            max = score
        } else if score < min {
            min = score
        }
        sum += score
    }

    return (min, max, sum)
}
let statistics = calculateStatistics(scores: [5, 3, 100, 3, 9])
print(statistics.sum)
print(statistics.2)
~~~

函数是可以嵌套的。嵌套函数可以访问声明在外层函数中的参数。可以通过嵌套函数来简化那些在一个函数中又长又复杂的代码。

~~~swift
func returnFifteen() -> Int {
    var y = 10
    func add() {
        y += 5
    }
    add()
    return y
}
returnFifteen()
~~~

函数是第一类对象（First-class object：在计算机科学中指可以在执行期创造并作为参数传递给其他函数或存入一个变数的实体 - 摘自维基百科）。就是说函数可以把另一个函数作为自己的返回值：

~~~swift
func makeIncrementer() -> ((Int) -> Int) {
    func addOne(number: Int) -> Int {
        return 1 + number
    }
    return addOne
}
var increment = makeIncrementer()
increment(7)
~~~

函数也可以把另一个函数作为自己的参数：

~~~swift
func hasAnyMatches(list: [Int], condition: (Int) -> Bool) -> Bool {
    for item in list {
        if condition(item) {
            return true
        }
    }
    return false
}
func lessThanTen(number: Int) -> Bool {
    return number < 10
}
var numbers = [20, 19, 7, 12]
hasAnyMatches(list: numbers, condition: lessThanTen)
~~~

函数实际上是一种特殊的闭包： 一段延后调用的代码。闭包中的代码可以存取在闭包内创建的变量和函数，即使闭包是在其他空间执行的——正如之前的嵌套函数一般。你可以将代码写在 `{}` 中来创建一个匿名闭包，用 in 来分隔函数名和返回值：

~~~swift
numbers.map({ (number: Int) -> Int in
    let result = 3 * number
    return result
})
~~~

> **小试身手**
>
> 重写闭包，让它对所有奇数返回0。

有许多方式可以让闭包更简洁。当闭包类型已知的时候，比如代理的回调，可以忽略其参数、或者其返回值，甚至两样都忽略掉。单语句闭包隐式地返回执行结果。

~~~swift
let mappedNumbers = numbers.map({ number in 3 * number })
print(mappedNumbers)
~~~

你可以通过参数位置而不是名字来引用参数——这种方式在很短的闭包中非常高效。当闭包作为函数最后一个参数时，它可以直接跟在圆括号后。而如果此时闭包又是函数的唯一参数，圆括号就可以省略掉了：

~~~swift
let sortedNumbers = numbers.sorted { $0 > $1 }
print(sortedNumbers)
~~~

### 类与对象

用 `class` + 类名来创建一个类。类中属性的声明写法和常量或者变量的声明写法是一样的，只是属性的作用域在类中。同理，类方法和函数的声明也是同样的写法：

~~~swift
class Shape {
    var numberOfSides = 0
    func simpleDescription() -> String {
        return "A shape with \(numberOfSides) sides."
    }
}
~~~

> **小试身手**
>
> 用 `let` 添加一个属性，再添加一个接收一个参数的方法。

在类名后添加圆括号来创建一个实体。用点语法来访问实体中的属性和方法。

~~~swift
var shape = Shape()
shape.numberOfSides = 7
var shapeDescription = shape.simpleDescription()
~~~

上述的 `Shape` 类缺了一个一些重要的东西：一个在类的实体创建时给它赋值的构造函数，用 `init` 创建：

~~~swift
class NamedShape {
    var numberOfSides: Int = 0
    var name: String

    init(name: String) {
        self.name = name
    }

    func simpleDescription() -> String {
        return "A shape with \(numberOfSides) sides."
    }
}
~~~

注意 `self` 是如何用来区分 `name` 属性和构造函数中的 `name` 参数的。创建一个类实体的时候，构造函数中的参数就像调用一个函数一样传递给它。每一个属性都需要赋值 - 或者是通过声明（如 `numberOfSides` ），或者是通过构造函数（如 `name` ）。

如果你需要在实例被系统回收前做一些清理工作，可以用 `deinit` 来创建一个析构函数。

在类名后添加冒号和父类的方式名来创建一个子类。类不需要继承任何标准基类，所以按需继承即可。

在子类中的方法用 `override` 修饰来覆盖父类实现。如果不用 `override` 修饰，方法就随机覆盖调用了，编译器自然就会报错。编译器也会探查 `override` 修饰的方法是否在父类中存在：

~~~swift
class Square: NamedShape {
    var sideLength: Double

    init(sideLength: Double, name: String) {
        self.sideLength = sideLength
        super.init(name: name)
        numberOfSides = 4
    }

    func area() -> Double {
        return sideLength * sideLength
    }

    override func simpleDescription() -> String {
        return "A square with sides of length \(sideLength)."
    }
}
let test = Square(sideLength: 5.2, name: "my test square")
test.area()
test.simpleDescription()
~~~

> **小试身手**
>
> 创建名为 `Circle` 的 `NamedShape` 的子类，在构造函数中传递 radius 和 name 属性值，并实现类中的 `area()` 和 `simpleDescription()` 方法。

类的属性除了简单的存储之外，还有可以有取值函数和赋值函数：

~~~swift
class EquilateralTriangle: NamedShape {
    var sideLength: Double = 0.0

    init(sideLength: Double, name: String) {
        self.sideLength = sideLength
        super.init(name: name)
        numberOfSides = 3
    }

    var perimeter: Double {
        get {
            return 3.0 * sideLength
        }
        set {
            sideLength = newValue / 3.0
        }
        /* set(newValueTest) {
            sideLength = newValueTest / 3.0
        } */
    }

    override func simpleDescription() -> String {
        return "An equilateral triangle with sides of length \(sideLength)."
    }
}
var triangle = EquilateralTriangle(sideLength: 3.1, name: "a triangle")
print(triangle.perimeter)
triangle.perimeter = 9.9
print(triangle.sideLength)
~~~

在 `perimeter` 的复制函数中，新值的隐式名称为 `newValue` 。你可以在 `set` 后的圆括号中提供明确的名称（官方文档此处未举例，注释为个人添加）。

注意 `EquilateralTriangle` 类的构造有三个不同的步骤：

1. 为子类声明的属性赋值；
2. 调用父类构造函数；
3. 修改父类定义的属性值。其他的调用函数、赋值函数和取值函数的工作也是在这个步骤进行的。

如果你不需要计算属性获得结果值，但是仍然需要在赋值前后进行一些操作的话，可以用 `willSet` 和 `didSet` 。你所写的代码可以在构造函数外的任何对属性值进行变更的时候执行。例如，下面这个类确保了三角形的边长总是和四边形的边长相等：

~~~swift
class TriangleAndSquare {
    var triangle: EquilateralTriangle {
        willSet {
            square.sideLength = newValue.sideLength
        }
    }
    var square: Square {
        willSet {
            triangle.sideLength = newValue.sideLength
        }
    }
    init(size: Double, name: String) {
        square = Square(sideLength: size, name: name)
        triangle = EquilateralTriangle(sideLength: size, name: name)
    }
}
var triangleAndSquare = TriangleAndSquare(size: 10, name: "another test shape")
print(triangleAndSquare.square.sideLength)
print(triangleAndSquare.triangle.sideLength)
triangleAndSquare.square = Square(sideLength: 50, name: "larger square")
print(triangleAndSquare.triangle.sideLength)
~~~

当处理可选值时，如函数、属性和下标中，你可以在这些操作前用 `?` 修饰。如果 `?` 前面的值为 `nil` ， `?` 后的所有代码都会被忽略，整个等式返回值为 `nil` 。反之， `?` 修饰的可选值会被解包并返值。不管是那种情况，整个等式的值都是一个可选值：

~~~swift
let optionalSquare: Square? = Square(sideLength: 2.5, name: "optional square")
let sideLength = optionalSquare?.sideLength
~~~

### 枚举和结构体

用 `enum` 来创建一个枚举，和类以及其他命名类型一样，枚举也可以有一些的内置方法：

~~~swift
enum Rank: Int {
    case ace = 1
    case two, three, four, five, six, seven, eight, nine, ten
    case jack, queen, king
    func simpleDescription() -> String {
        switch self {
        case .ace:
            return "ace"
        case .jack:
            return "jack"
        case .queen:
            return "queen"
        case .king:
            return "king"
        default:
            return String(self.rawValue)
        }
    }
}
let ace = Rank.ace
let aceRawValue = ace.rawValue
~~~

> **小试身手**
>
> 写一个通过比较具体值来比较两个 `Rank` 类型值的函数。

在 Swift 中默认从0开始依次累加具体值，但你也可以自定义具体值。在上例中， `Ace` 就被赋予了具体值 1 ，其他的具体值就会在这个基础上顺序递增。你也可用字符串或者浮点数作为枚举的具体值。用 `rawValue` 属性来读取枚举值。

用 `init?(rawValue:)` 初始化函数来通过具体值创建一个枚举的实例。它要么返回一个和具体值相匹配的枚举值，要么返会 `nil` ：

~~~swift
if let convertedRank = Rank(rawValue: 3) {
    let threeDescription = convertedRank.simpleDescription()
}
~~~

枚举的枚举值都是实际值，并不是具体值的另一种写法。其实，不必定义那些无意义的枚举值：

~~~swift
enum Suit {
    case spades, hearts, diamonds, clubs
    func simpleDescription() -> String {
        switch self {
        case .spades:
            return "spades"
        case .hearts:
            return "hearts"
        case .diamonds:
            return "diamonds"
        case .clubs:
            return "clubs"
        }
    }
}
let hearts = Suit.hearts
let heartsDescription = hearts.simpleDescription()
~~~

> **小试身手**
>
> 在 `Suit` 中添加一个 `color()` 方法，黑桃和梅花返回 "black" ,红桃和方块返回 "red" .

注意以上枚举中 `hearts` 的两种调用方式的区别：当给 `hearts` 常量赋值的时候，枚举 `Suit.hearts` 使用了全名，这是因为常量没有明确的类型。但在 switch 中，枚举值缩写成了 `.hearts` ，因为 `self` 的值已经确定是一种花色了。只要值的类型已知，任何时候都能用缩写。

如果一个枚举有具体值，那些值就会作为声明的一部分，也就是说，枚举成员的具体值对于所有实例都是相同的。另外一种声明枚举值的方式就是把具体值和枚举值关联 - 当你生成实例时具体值是确定的，它在每一个枚举值的实例中都可以是不相同的。你可以把关联值的方式想像成枚举实例中存储着不同属性。如下例，向服务器请求获得日出和日落时间，服务器要么返回请求的信息，要么返回错误描述：

~~~swift
enum ServerResponse {
    case result(String, String)
    case failure(String)
}

let success = ServerResponse.result("6:00 am", "8:09 pm")
let failure = ServerResponse.failure("Out of cheese.")

switch success {
case let .result(sunrise, sunset):
    print("Sunrise is at \(sunrise) and sunset is at \(sunset).")
case let .failure(message):
    print("Failure...  \(message)")
}
//官方文档此处不完整，以下为个人添加
switch failure {
case let .result(sunrise, sunset):
    print("Sunrise is at \(sunrise) and sunset is at \(sunset)")
case let .failure(message):
    print("Failure... \(message)")
}
~~~

> **小试身手**
>
> 在 `ServerResponse` 中添加一个新枚举值，并将它添加到switch判断中.

注意上例中，作为 switch 中相匹配的值，日出和日落时间是如果从 `ServerResponse` 中取出来的。

用 `struct` 创建一个结构体，结构体和类有很多相似的地方，同样包括方法和构造函数。但类和结构体最大的不同之一在于：结构体在传递的过程中经常是通过复制传递，而类通过引用传递：

~~~swift
struct Card {
    var rank: Rank
    var suit: Suit
    func simpleDescription() -> String {
        return "The \(rank.simpleDescription()) of \(suit.simpleDescription())"
    }
}
let threeOfSpades = Card(rank: .three, suit: .spades)
let threeOfSpadesDescription = threeOfSpades.simpleDescription()
~~~

> **小试身手**
>
> 在 `Card` 中添加一个创建一整副纸牌的方法，每张牌都有花色和点数。

### 协议和扩展

用 `protocol` 来创建一个协议：

~~~swift
protocol ExampleProtocol {
    var simpleDescription: String { get }
    mutating func adjust()
}
~~~

类，枚举和结构体都能继承协议：

~~~swift
class SimpleClass: ExampleProtocol {
    var simpleDescription: String = "A very simple class."
    var anotherProperty: Int = 69105
    func adjust() {
        simpleDescription += "  Now 100% adjusted."
    }
}
var a = SimpleClass()
a.adjust()
let aDescription = a.simpleDescription

struct SimpleStructure: ExampleProtocol {
    var simpleDescription: String = "A simple structure"
    mutating func adjust() {
        simpleDescription += " (adjusted)"
    }
}
var b = SimpleStructure()
b.adjust()
let bDescription = b.simpleDescription
~~~

> **小试身手**
>
> 创建一个继承协议的枚举

注意上述声明 `SimpleStructer` 时的 `mutating` 关键词，标记其修饰的方法修改了结构体内容。而声明 `SimpleClass` 则不需要，因为类中的方法可以随意修改类。

用 `extension` 来为一个已有类型来添加功能，比如一个新函数或者属性的计算。你可以用扩展来随时为一个数据类型添加统一的扩展，库中的方法，框架中的方法同样适用：

~~~swift
extension Int: ExampleProtocol {
    var simpleDescription: String {
        return "The number \(self)"
    }
    mutating func adjust() {
        self += 42
    }
}
print(7.simpleDescription)
~~~

> **小试身手**
>
> 写一个 `Double` 类型的扩展，在其中添加 `absoluteValue` 属性。

跟其他命名类型一样，协议名可以作为命名类型 - 比如，创建一个元素不同类型但都继承统一协议的集合。当你操作一个协议类型的变量时，协议外定义的函数不能够被调用：

~~~swift
let protocolValue: ExampleProtocol = a
print(protocolValue.simpleDescription)
// print(protocolValue.anotherProperty)  // 取消注释查看异常
~~~

即使 `protocolValue` 变量在运行时类型为 `SimpleClass` ，但是编译器会按照显式类型 `ExampleProtocol` 来编译它。就是说，你不能随意的去读取类继承自协议的方法和属性。

### 异常处理

任何类型都能通过继承 `Error` 协议来处理异常：

~~~swift
enum PrinterError: Error {
    case outOfPaper
    case noToner
    case onFire
}
~~~

用 `throw` 来抛出一个异常， `throws` 标记可能抛出异常的函数。如果你在函数中抛出了异常，函数会立即返回并且调用异常处理函数：

~~~swift
func send(job: Int, toPrinter printerName: String) throws -> String {
    if printerName == "Never Has Toner" {
        throw PrinterError.noToner
    }
    return "Job sent"
}
~~~

有很多方式来处理异常，一种方式是就是用 `do-catch` ：在 `do` 模块中，可以在抛出异常的代码之前写上 `try` ，在 `catch` 模块中，就自动生成名为 `error` 的异常，也可以自定义异常的名字：

~~~swift
do {
    let printerResponse = try send(job: 1040, toPrinter: "Bi Sheng")
    print(printerResponse)
} catch {
    print(error)
}
~~~

> **小试身手**
>
> 把打印机状态参数改为 `"Never Has Toner"` 让 `send(job:toPrinter:)` 函数抛出一个异常

可以写多个 `catch` 模块来捕获详细的异常状态。写 `catch` 的模式就和 switch 中写 `case` 一样：

~~~swift
do {
    let printerResponse = try send(job: 1440, toPrinter: "Gutenberg")
    print(printerResponse)
} catch PrinterError.onFire {
    print("I'll just put this over here, with the rest of the fire.")
} catch let printerError as PrinterError {
    print("Printer error: \(printerError).")
} catch {
    print(error)
}
~~~

> **小试身手**
>
> 在 `do` 模块中添加能抛出异常的代码。抛出哪种异常能进入第一种 `catch` 模块？其他模块呢？


另一种方式就是用 `try?` 把结果变成可选类型，如果函数抛出一个异常，具体的异常就返回 `nil` 并失效了。反之，返回的就是包含函数返回值的可选类型：

~~~swift
let printerSuccess = try? send(job: 1884, toPrinter: "Mergenthaler")
let printerFailure = try? send(job: 1885, toPrinter: "Never Has Toner")
~~~

用 `defer` 在函数 `return` 前修饰一段需要最后执行的代码，这段代码无论函数是否抛出异常都会执行。可以用 `defer` 来同时写不同时执行的设置和清理代码：

~~~swift
var fridgeIsOpen = false
let fridgeContent = ["milk", "eggs", "leftovers"]

func fridgeContains(_ food: String) -> Bool {
    fridgeIsOpen = true
    defer {
        fridgeIsOpen = false
    }

    let result = fridgeContent.contains(food)
    return result
}
fridgeContains("banana")
print(fridgeIsOpen)
~~~

### 范型

在尖括号中写上名字来定义一个范型函数或者类型：

~~~swift
func makeArray<Item>(repeating item: Item, numberOfTimes: Int) -> [Item] {
    var result = [Item]()
    for _ in 0..<numberOfTimes {
        result.append(item)
    }
    return result
}
makeArray(repeating: "knock", numberOfTimes: 4)
~~~

可以在函数和方法中定义范型，同样在类、枚举和结构体中也可以：

~~~swift
// 重载Swift标准库的可选类型
enum OptionalValue<Wrapped> {
    case none
    case some(Wrapped)
}
var possibleInteger: OptionalValue<Int> = .none
possibleInteger = .some(100)
~~~

在函数内容前用 `where` 来详细说明对类型的一系列需求 - 比如，要求实现某一个协议，要求两个类型是相同的，或者要求某个类必须有一个特定的父类：

~~~swift
func anyCommonElements<T: Sequence, U: Sequence>(_ lhs: T, _ rhs: U) -> Bool
    where T.Iterator.Element: Equatable, T.Iterator.Element == U.Iterator.Element {
        for lhsItem in lhs {
            for rhsItem in rhs {
                if lhsItem == rhsItem {
                    return true
                }
            }
        }
        return false
}
anyCommonElements([1, 2, 3], [3])
~~~

> **小试身手**
>
> 修改 `anyCommonElements(_:_:)` 函数，让它返回一个两个集合中共有的相同元素的数组。

缩写成 `<T: Equatable>` 和 `Writing <T: Equatable>` 是一样的。
