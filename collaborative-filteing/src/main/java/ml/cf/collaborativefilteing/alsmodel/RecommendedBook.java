package ml.cf.collaborativefilteing.alsmodel;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;


@Data @AllArgsConstructor @NoArgsConstructor @Builder
public class RecommendedBook {
    private int bookId;
    private float expectedRating;
}
