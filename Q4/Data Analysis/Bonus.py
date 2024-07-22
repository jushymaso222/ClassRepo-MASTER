def ToBinary(num):
    rems = []
    number = num
    while number > 0:
        rems.append(number % 2)
        number = number // 2
    result = ""
    rems.reverse()
    for i in range(0, len(rems)):
        result += str(rems[i])
    return result

def ToDecimal(num):
    sum = 0
    num = str(num)
    for i in range(0, len(num)):
        sum += (int(num[len(num)-(i+1)])*(2**(i)))
    return sum

print("Please choose a selection from  the menu below [1 / 2]:\n\t[1] Decimal -> Binary\n\t[2] Binary -> Decimal\n")
selection = input()
if selection == "1":
    dec = input("Please enter the number you wish to convert: ")
    answer = ToBinary(int(dec))
else:
    bin = input("Please enter the binary you wish to convert: ")
    answer = ToDecimal(int(bin))
print(f"\nYour converted answer is: {answer}")