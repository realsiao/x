// http://localhost:8000/get_data

#![feature(proc_macro_hygiene, decl_macro)]

#[macro_use] extern crate rocket;

use rocket::Request;
use rocket::response::status::NotFound;
use rocket::serde::{Deserialize, Serialize};

#[derive(Serialize, Deserialize)]
struct Person {
    name: String,
    age: u32,
    description: String,
}

#[get("/get_data")]
fn get_data() -> String {
    let person = Person {
        name: String::from("ChatGPT"),
        age: 2,
        description: String::from("I am a chatbot!"),
    };
    serde_json::to_string(&person).unwrap()
}

#[post("/post_data", format = "json", data = "<person>")]
fn post_data(person: serde_json::Value) -> String {
    let name = person["name"].as_str().unwrap();
    let age = person["age"].as_u64().unwrap() as u32;
    let description = person["description"].as_str().unwrap();
    format!("Your name is {}, you are {} years old, and you said \"{}\"", name, age, description)
}

#[catch(404)]
fn not_found(req: &Request) -> NotFound<String> {
    NotFound(format!("404: {} not found", req.uri()))
}

fn main() {
    rocket::ignite()
        .mount("/", routes![get_data, post_data])
        .register(catchers![not_found])
        .launch();
}
