package ml.cf.collaborativefilteing.models;

import lombok.*;
import org.springframework.data.cassandra.core.mapping.PrimaryKey;
import org.springframework.data.cassandra.core.mapping.Table;

@Table(value = "users")
@Getter @Setter @AllArgsConstructor @NoArgsConstructor @Builder @ToString
public class User {
    @PrimaryKey
    private Integer userId;
    private String city;
    private String country;
}
