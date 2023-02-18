import threading

def print_numbers():
    for i in range(10):
        print(i)

def print_letters():
    for letter in 'abcdefghij':
        print(letter)

# 创建两个线程
thread1 = threading.Thread(target=print_numbers)
thread2 = threading.Thread(target=print_letters)

# 启动两个线程
thread1.start()
thread2.start()

# 等待两个线程执行完毕
thread1.join()
thread2.join()
