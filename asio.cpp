#include <iostream>
#include <boost/asio.hpp>

int main()
{
    using boost::asio::ip::tcp;

    boost::asio::io_context io_context;
    tcp::resolver resolver(io_context);
    tcp::resolver::results_type endpoints =
        resolver.resolve("www.google.com", "80");

    tcp::socket socket(io_context);
    boost::asio::connect(socket, endpoints);

    boost::asio::streambuf request;
    std::ostream request_stream(&request);
    request_stream << "GET / HTTP/1.0\r\n";
    request_stream << "Host: www.google.com\r\n";
    request_stream << "Accept: */*\r\n";
    request_stream << "Connection: close\r\n\r\n";

    boost::asio::write(socket, request);

    boost::asio::streambuf response;
    boost::asio::read_until(socket, response, "\r\n");

    std::istream response_stream(&response);
    std::string http_version;
    response_stream >> http_version;
    unsigned int status_code;
    response_stream >> status_code;
    std::string status_message;
    std::getline(response_stream, status_message);

    if (!response_stream || http_version.substr(0, 5) != "HTTP/")
    {
        std::cout << "Invalid response\n";
        return 1;
    }

    if (status_code != 200)
    {
        std::cout << "Response returned with status code " << status_code << "\n";
        return 1;
    }

    boost::asio::read_until(socket, response, "\r\n\r\n");

    std::string header;
    while (std::getline(response_stream, header) && header != "\r")
        std::cout << header << "\n";
    std::cout << "\n";

    if (response.size() > 0)
        std::cout << &response;

    return 0;
}
