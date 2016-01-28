#Enumerations - Swift知识集

##枚举
* **枚举值（Raw Value）**

~~~ swift
enum httpMethod: String {
    case GET = "GET"
    case POST = "POST"
}
~~~

* **相关值（Associated Values）**

~~~ swift
enum Barcode {
    case UPCA(Int, Int, Int, Int)
    case QRCode(String)
}

var productBarcode = Barcode.UPCA(8, 85909, 51226, 3)

~~~

* **递归枚举（Recursive Enumerations）**

~~~ swift
enum ArithmeticExpression {
    case Number(Int)
    indirect case Addition(ArithmeticExpression, ArithmeticExpression)
    indirect case Multiplication(ArithmeticExpression, ArithmeticExpression)
}

indirect enum ArithmeticExpression {
    case Number(Int)
    case Addition(ArithmeticExpression, ArithmeticExpression)
    case Multiplication(ArithmeticExpression, ArithmeticExpression)
}
~~~

**示例：**

~~~ swift
// evaluate (5 + 4) * 2
let five = ArithmeticExpression.Number(5)
let four = ArithmeticExpression.Number(4)
let sum = ArithmeticExpression.Addition(five, four)
let product = ArithmeticExpression.Multiplication(sum, ArithmeticExpression.Number(2))
print(evaluate(product))
// prints "18"
~~~

##出处
[The Swift Programming Language (Swift 2.1)
 Enumerations](https://developer.apple.com/library/ios/documentation/Swift/Conceptual/Swift_Programming_Language/Enumerations.html)