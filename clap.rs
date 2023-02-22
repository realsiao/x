use clap::{App, Arg};

fn main() {
    let matches = App::new("MyApp")
        .version("1.0")
        .author("Author")
        .about("Describes MyApp")
        .arg(
            Arg::with_name("input")
                .short("i")
                .long("input")
                .value_name("INPUT")
                .help("Sets the input file to use")
                .takes_value(true),
        )
        .arg(
            Arg::with_name("output")
                .short("o")
                .long("output")
                .value_name("OUTPUT")
                .help("Sets the output file to use")
                .takes_value(true),
        )
        .get_matches();

    let input = matches.value_of("input").unwrap_or("input.txt");
    let output = matches.value_of("output").unwrap_or("output.txt");

    println!("Using input file: {}", input);
    println!("Using output file: {}", output);
}
