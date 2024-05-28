package ml.cf.collaborativefilteing.dto;

import ml.cf.collaborativefilteing.models.Book;
import org.springframework.stereotype.Service;

public class BookConverter {

    public static BookDTO from(Book book){
        return BookDTO.builder()
                .name(book.getTitle())
                .imageUrl(book.getImageL())
                .build();
    }
}
