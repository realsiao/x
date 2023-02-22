# http://127.0.0.1:5000/api/get_data
# 设置 Content-Type 为 application/json，请求一个 JSON 格式的数据
from flask import Flask, jsonify, request

app = Flask(__name__)

# GET 请求
@app.route('/api/get_data', methods=['GET'])
def get_data():
    data = {'name': 'ChatGPT', 'age': 2, 'description': 'I am a chatbot!'}
    return jsonify(data)

# POST 请求
@app.route('/api/post_data', methods=['POST'])
def post_data():
    data = request.get_json()
    name = data['name']
    age = data['age']
    description = data['description']
    result = {'message': f'Your name is {name}, you are {age} years old, and you said "{description}"'}
    return jsonify(result)

if __name__ == '__main__':
    app.run(debug=True)
