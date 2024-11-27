## Description

This project provides an abstraction layer for reading data from files with flexible adapters, allowing the integration of multiple file types. It also introduces the concept of row factories, which define how lines in a file should be parsed, enabling easy extensibility and reuse for different formats.

## Features

- **File Adapters**: Allows reading data from various file formats using a common interface, ensuring compatibility with multiple data sources.
- **Row Factories**: Enables the identification and parsing of rows in a file based on different factory methods, making it easy to extend for new use cases.
- **Examples**: Provides practical examples of how row factories can be used to handle various file types.

## Things to Consider

- Is it really necessary to have two separate adapters, one for ',' and one for ';'?
- Would it be better to create an object that represents the return value of the RowFactory?