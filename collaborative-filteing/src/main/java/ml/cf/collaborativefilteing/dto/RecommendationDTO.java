package ml.cf.collaborativefilteing.dto;

import lombok.*;
import ml.cf.collaborativefilteing.models.Book;

import java.util.List;

@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
@Builder
public class RecommendationDTO {
    private Integer userId;
    private List<BookDTO> recommendedBooks;
}
