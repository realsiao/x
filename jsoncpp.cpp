#include <iostream>
#include <json/json.h>

int main()
{
    Json::Value root;
    Json::Reader reader;

    std::string json_data = "{\"name\":\"John\",\"age\":30,\"city\":\"New York\"}";
    bool parsingSuccessful = reader.parse(json_data, root);
    if (!parsingSuccessful)
    {
        std::cout << "Failed to parse JSON" << std::endl
                  << reader.getFormattedErrorMessages();
        return 1;
    }

    std::string name = root.get("name", "").asString();
    int age = root.get("age", 0).asInt();
    std::string city = root.get("city", "").asString();

    std::cout << "Name: " << name << std::endl;
    std::cout << "Age: " << age << std::endl;
    std::cout << "City: " << city << std::endl;

    return 0;
}
