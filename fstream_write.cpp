#include <iostream>
#include <fstream>
#include <string>

int main()
{
    std::ofstream file("file.txt");
    if (file.is_open())
    {
        file << "Hello World\n";
        file << "This is a test\n";
        file.close();
    }
    else
    {
        std::cout << "Unable to open file";
    }

    return 0;
}
