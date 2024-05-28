package ml.cf.collaborativefilteing.services;

import lombok.AllArgsConstructor;
import ml.cf.collaborativefilteing.alsmodel.Recommander;
import ml.cf.collaborativefilteing.dto.BookDTO;
import ml.cf.collaborativefilteing.dto.RecommendationDTO;
import ml.cf.collaborativefilteing.models.Book;
import ml.cf.collaborativefilteing.repositories.BookRepository;
import org.springframework.stereotype.Service;
import java.util.List;
import java.util.Optional;

@Service
@AllArgsConstructor
public class RecommenderServiceImpl implements RecommenderService{

    private final Recommander recommander;
    private final BookRepository bookRepository;

    @Override
    public RecommendationDTO getRecommendedBooks(Integer userId, int top) {
        List<BookDTO> bookDTOList = recommander.recommendBooksToUser(userId, top)
                .stream()
                .<BookDTO>mapMulti(((recommendedBook, consumer) -> {
                    bookRepository.findById(recommendedBook.getBookId())
                            .ifPresent(book -> consumer.accept(
                                    BookDTO.builder()
                                            .imageUrl(book.getImageL())
                                            .name(book.getTitle())
                                            .expectedRating(recommendedBook.getExpectedRating())
                                            .build()
                            ));
                })).toList();
        return RecommendationDTO.builder()
                .userId(userId)
                .recommendedBooks(bookDTOList)
                .build();

    }
}
